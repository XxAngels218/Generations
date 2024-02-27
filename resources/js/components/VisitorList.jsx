import React, { useState, useEffect } from 'react';

const VisitorList = () => {
  const [visitors, setVisitors] = useState([]);

  useEffect(() => {
    // Realiza la llamada a la API para obtener la lista de visitantes
    fetch('/api/visitors')
      .then(response => response.json())
      .then(data => setVisitors(data));
  }, []);

  return (
    <div>
      <h2 className="mb-4">Lista de Visitantes</h2>
      <table className="table table-bordered table-striped">
        <thead className="table-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">DUI</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Generación</th>
          </tr>
        </thead>
        <tbody>
          {visitors.map(visitor => (
            <tr key={visitor.id}>
              <td>{visitor.name}</td>
              <td>{visitor.email}</td>
              <td>{visitor.dui}</td>
              <td>{visitor.phone}</td>
              <td>{visitor.generation}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default VisitorList;
