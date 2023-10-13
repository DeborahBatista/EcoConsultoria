import React, { useState, useEffect } from 'react';
import axios from 'axios';

function UsuarioList() {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios.get('localhost:8000/api/usuarios') // Substitua pela URL da sua API de usuários
      .then((response) => {
        setData(response.data);
        setLoading(false);
      })
      .catch((error) => {
        console.error('Erro ao buscar dados de usuários:', error);
        setLoading(false);
      });
  }, []);

  // Função para excluir um usuário
  const handleDelete = (id) => {
    // Envie uma solicitação para a API para excluir o usuário com o ID especificado
    axios.delete(`localhost:8000/api/usuarios/${id}`)
      .then(() => {
        // Atualize a lista de usuários após a exclusão
        const updatedData = data.filter((usuario) => usuario.id !== id);
        setData(updatedData);
      })
      .catch((error) => {
        console.error('Erro ao excluir usuário:', error);
      });
  };

  return (
    <div>
      <h1>Lista de Usuários</h1>
      {loading ? (
        <p>Carregando dados...</p>
      ) : (
        <table className="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Grupo</th>
              <th>Setor</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {data.map((usuario) => (
              <tr key={usuario.id}>
                <td>{usuario.nome}</td>
                <td>{usuario.grupo_id}</td>
                <td>{usuario.setor}</td>
                <td>{usuario.email}</td>
                <td>{usuario.telefone}</td>
                <td>
                  <button
                    onClick={() => handleDelete(usuario.id)}
                    className="btn btn-danger"
                  >
                    Excluir
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </div>
  );
}

export default UsuarioList;
