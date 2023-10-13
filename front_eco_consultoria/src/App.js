import logo from './logo.svg';
import './App.css';
import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import Login from './components/login';
import OrdemServicoList from './components/OrdemServicoList';
import UsuarioList from './components/UsuarioList';
import GruposList from './components/GruposList';

function App() {
   return (
      <Router>
         <div>
            <Routes>
               <Route path="/login" element={<Login />} />
               <Route path="/ordem-servico" element={<OrdemServicoList />} />
               <Route path="/grupos" element={<GruposList />} />
            </Routes>
         </div>
      </Router>
   );
}

export default App;
