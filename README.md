# EcoConsultoria
 
Teste Eco Consultoria


Comecei modelando o banco: no qual foi criado 3 tabelas à nivel didático para o teste, foram eles:
usuario[
         'nome',
        'password',
        'grupo_id',
        'setor',
        'email',
        'telefone']
grupo [
    'nome'
]
ordem de serviço[
    'numero',
        'titulo',
        'descricao',
        'prioridade',
        'responsavel_id',
        'data_inicio',
        'data_fim',
        'status'
]

Ainda sim no banco, na tabela grupo, ao ser criado já esta sendo executado um insert de tres tipos de grupos:
Administrador
Gerente 
Funcionário

e na tabela usuario:
automaticamente criado um usuario Administrador

No propósito de ser um sistema de uso apenas de uma empresa, o usuario, grupo e ordem de serviços só poderá ser inserido por um usuario previamento cadastrado
que tenha o perfil de usuario admnistrador, garanti que este nivel de acesso seja efetivado atraves das regras e do policy atraves da chave estrageira grupo na
tabela usuario (grupo_id), o que impossibilita que seja deletado no crud pois há uma regra de negocios que a envolve, nos controllers todas as verificações estão
comentadas para testes de endpoint caso deseje, porém se tirar os traços que comentam o código as regras de acesso funcionam os endpoints retornam aos requisitos do crud.
 sendo eles:
 previamente você precisa iniciar o servidor do laravel com o seguinte comando: php artisan serve
 em seguida o desenvolvedor pode usar uma ferramenta de test backend (insmnia ou Postman)
 localhost:8000/api/ordem-servico;
 localhost:8000/api/grupos;
 localhost:8000/api/usuarios;
 localhost:8000/api/login;
 
 Como são endpoinst apiResource, eles possuem todas os requisitos necessários (GET, PUT,POST e etc...)

 Separado foi criado um front atendendo ao crud com apenas os botoes necessários para executar o backend 
 e recebendo as rotas de api conforme um frontend separado, feito em react sem nenhuma predileção, apenas a nivel didático.

 é necessário o node previamente instalado na maquina que ira rodar o sistema, para que o front seja executado
 node previamente instalado é possivel executar no cmd o comando dentro do diretorio do front que irá executar o servidor do front:
 http://localhost:3000/ordem-servico
http://localhost:3000/usuarios
http://localhost:3000/grupos
http://localhost:3000/login
 no qual também é possivel testar também.

 Estarei disponivel para mais esclarecimento caso deseje.

 





