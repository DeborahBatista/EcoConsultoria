import React, { useState, useEffect } from 'react';
import axios from 'axios';

function OrdemServicoList() {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true); // Estado para rastrear o carregamento de dados

  useEffect(() => {
    // Fazer uma chamada à sua API para buscar as ordens de serviço.
    axios.get('http://localhost:8000/api/ordem-servico')// Substitua pela URL da sua API
      .then((response) => {
        setData(response.data);
        setLoading(false); // Marcar que os dados foram carregados
      })
      .catch((error) => {
        console.error('Erro ao buscar dados das ordens de serviço:', error);
        setLoading(false); // Marcar que ocorreu um erro no carregamento
      });
  }, []);

  return (
    <div>
      <h1>Lista de Ordens de Serviço</h1>
      {loading ? ( // Verificar se os dados estão sendo carregados
        <p>Carregando dados...</p>
      ) : (
        <table className="table">
          <thead>
            <tr>
              <th>Número</th>
              <th>Título</th>
              <th>Descrição</th>
              <th>Prioridade</th>
              <th>Responsável</th>
              <th>Data de Início</th>
              <th>Data de Fim</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            {data.map((ordemServico) => (
              <tr key={ordemServico.numero}>
                <td>{ordemServico.numero}</td>
                <td>{ordemServico.titulo}</td>
                <td>{ordemServico.descricao}</td>
                <td>{ordemServico.prioridade}</td>
                <td>{ordemServico.responsavel_id}</td>
                <td>{ordemServico.data_inicio}</td>
                <td>{ordemServico.data_fim}</td>
                <td>{ordemServico.status}</td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </div>
  );
}

export default OrdemServicoList;
