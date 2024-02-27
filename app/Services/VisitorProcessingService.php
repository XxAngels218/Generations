<?php

namespace App\Services;

use App\Models\GenerationLog;
use App\Models\Visitor;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitorProcessingService
{
    const BABY_BOOMERS = 'Baby boomers';
    const GENERACION_X = 'Generación X';
    const MILLENNIALS = 'Millennials';
    const GENERACION_Z = 'Generación Z';
    const GENERACION_ALPHA = 'Generación Alpha';
    const OTRA_GENERACION = 'Otra generación';

    public function processVisitors()
    {
        $visitors = Visitor::all();
        $pdfData = [];

        foreach ($visitors as $visitor) {
            try {
                $this->processVisitor($visitor, $pdfData);
            } catch (\Exception $exception) {
                logger()->error("Error processing visitor {$visitor->id}: " . $exception->getMessage());
            }
        }

        $this->generatePDF($pdfData);
    }

    private function processVisitor(Visitor $visitor, &$pdfData)
    {
        $birthdate = Carbon::parse($visitor->birthdate);
        $currentYear = Carbon::now()->year;

        if ($visitor->generation !== null) {
            return; // continue to the next visitor
        }

        if ($birthdate->year >= 1949 && $birthdate->year <= 1968) {
            $generation = self::BABY_BOOMERS;
        } elseif ($birthdate->year >= 1969 && $birthdate->year <= 1980) {
            $generation = self::GENERACION_X;
        } elseif ($birthdate->year >= 1981 && $birthdate->year <= 1993) {
            $generation = self::MILLENNIALS;
        } elseif ($birthdate->year >= 1994 && $birthdate->year <= 2010) {
            $generation = self::GENERACION_Z;
        } elseif ($birthdate->year >= 2010 && $birthdate->year <= $currentYear) {
            $generation = self::GENERACION_ALPHA;
        } else {
            $generation = self::OTRA_GENERACION;
        }

        $visitor->generation = $generation;
        $visitor->save();

        GenerationLog::create([
            'visitor_id' => $visitor->id,
            'generation' => $generation,
        ]);

        $pdfData[] = [
            'name' => $visitor->name,
            'generation' => $generation,
        ];
    }

    private function generatePDF(array $pdfData)
    {
        if (!empty($pdfData)) {
            $pdf = Pdf::loadView('pdf.visitors', compact('pdfData'));
            $pdfPath = storage_path('app/public/reports/visitors_report.pdf');

            if (!file_exists(dirname($pdfPath))) {
                mkdir(dirname($pdfPath), 0755, true);
            }

            $pdf->save($pdfPath);
            logger()->info('pdf generated successfully');
        } else {
            logger()->info('no data to generate the PDF');
        }
    }
}
