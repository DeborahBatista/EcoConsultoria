import React, { useState, useEffect } from 'react';
import axios from 'axios';

function GrupoList() {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios.get('localhost:8000/api/grupos') // Substitua pela URL da sua API de grupos
      .then((response) => {
        setData(response.data);
        setLoading(false);
      })
      .catch((error) => {
        console.error('Erro ao buscar dados de grupos:', error);
        setLoading(false);
      });
  }, []);

  // Função para excluir um grupo
  const handleDelete = (id) => {
    // Envie uma solicitação para a API para excluir o grupo com o ID especificado
    axios.delete(`localhost:8000/api/grupos/${id}`)
      .then(() => {
        // Atualize a lista de grupos após a exclusão
        const updatedData = data.filter((grupo) => grupo.id !== id);
        setData(updatedData);
      })
      .catch((error) => {
        console.error('Erro ao excluir grupo:', error);
      });
  };

  return (
    <div>
      <h1>Lista de Grupos</h1>
      {loading ? (
        <p>Carregando dados...</p>
      ) : (
        <table className="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {data.map((grupo) => (
              <tr key={grupo.id}>
                <td>{grupo.nome}</td>
                <td>
                  <button
                    onClick={() => handleDelete(grupo.id)}
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

export default GrupoList;
