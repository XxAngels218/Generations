import React, { useState } from 'react';

const VisitorForm = ({ onVisitorAdded }) => {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [dui, setDui] = useState('');
  const [birthdate, setBirthdate] = useState('');
  const [phone, setPhone] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();

    // Realiza la llamada a la API para guardar el visitante
    fetch('/api/visitors', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name, email, dui, birthdate, phone }),
    })
      .then(response => response.json())
      .then(data => {
        // Aquí puedes manejar la respuesta de la API según tus necesidades
        console.log('Nuevo visitante guardado:', data);

        // Actualiza la lista de visitantes llamando a la función proporcionada por el padre
        onVisitorAdded(data);

        // Limpia el formulario después de enviar
        setName('');
        setEmail('');
        setDui('');
        setBirthdate('');
        setPhone('');
      });
  };

  return (
    <div className="container">
      <div className="row justify-content-center">
        <div className="col-md-6">
          <div className="card mt-5">
            <div className="card-body">
              <form onSubmit={handleSubmit}>
                <h2 className="mb-4">Registrar Nuevo Visitante</h2>
                <div className="mb-3">
                  <label htmlFor="name" className="form-label">Nombre:</label>
                  <input
                    type="text"
                    className="form-control"
                    id="name"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    required
                  />
                </div>
                <div className="mb-3">
                  <label htmlFor="email" className="form-label">Correo Electrónico:</label>
                  <input
                    type="email"
                    className="form-control"
                    id="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    required
                  />
                </div>
                <div className="mb-3">
                  <label htmlFor="dui" className="form-label">DUI:</label>
                  <input
                    type="text"
                    className="form-control"
                    id="dui"
                    value={dui}
                    onChange={(e) => setDui(e.target.value)}
                    required
                  />
                </div>
                <div className="mb-3">
                  <label htmlFor="birthdate" className="form-label">Fecha de Nacimiento:</label>
                  <input
                    type="date"
                    className="form-control"
                    id="birthdate"
                    value={birthdate}
                    onChange={(e) => setBirthdate(e.target.value)}
                    required
                  />
                </div>
                <div className="mb-3">
                  <label htmlFor="phone" className="form-label">Teléfono:</label>
                  <input
                    type="tel"
                    className="form-control"
                    id="phone"
                    value={phone}
                    onChange={(e) => setPhone(e.target.value)}
                    required
                  />
                </div>
                <button type="submit" className="btn btn-secondary">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default VisitorForm;
