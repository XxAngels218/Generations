import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.css';
import { Navbar, Nav, NavDropdown } from 'react-bootstrap';
import VisitorForm from './components/VisitorForm';
import VisitorList from './components/VisitorList';

const App = () => {
  return (
    <Router>
      <div>
        <Navbar bg="dark" variant="dark" expand="lg" className="mb-3">
          <Navbar.Toggle aria-controls="basic-navbar-nav" />
          <Navbar.Collapse id="basic-navbar-nav">
            <Nav className="mr-auto">
              <NavDropdown title="Mi Aplicación" id="basic-nav-dropdown">
                <NavDropdown.Item as={Link} to="/">Inicio</NavDropdown.Item>
                <NavDropdown.Item as={Link} to="/list">Lista de Visitantes</NavDropdown.Item>
                <NavDropdown.Item as={Link} to="/form">Formulario</NavDropdown.Item>
              </NavDropdown>
            </Nav>
          </Navbar.Collapse>
        </Navbar>

        <Routes>
          <Route path="/list" element={<VisitorList />} />
          <Route path="/form" element={<VisitorForm />} />
        </Routes>
      </div>
    </Router>
  );
};

if (document.getElementById('root')) {
  const Index = ReactDOM.createRoot(document.getElementById('root'));

  Index.render(
    <React.StrictMode>
      <App />
    </React.StrictMode>
  );
}
