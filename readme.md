# Projeto SA - Fast Sesi

<p>
  <img src="https://raw.githubusercontent.com/hisabellippel/fast-sesi/refs/heads/main/asets/imagens/barraAbaixo/logo.png" width="100" alt="accessibility text">
</p>

## Integrantes
Ana Luiza do Amaral, Gustavo Baumann, Hisabel Lippel e Julia Izabel

## Sobre
Nesse projeto após a conclusão dos mockups, recriamos a aplicação.
Criando assim, a primeira ideia de nosso aplicativo para o gerenciamento de uma ferrovia.
No momento estamos na terceira etapa de nosso projeto, iniciando as aplicações em PHP.

Esse repositório contém um sistema de uma ferrovia onde o Administrador pode cadastrar novos usuários e excluílos, porém o usuário não pode cadastrar e excluir demais funcionários. É um trabalho para a SA - da matéria de Desenvolvimento de Sistemas.

## Funcionalidades
- Criação de funcionários;
- Visualização de informações de funconários;
- Edição de informação de funcionários;
- Exclusão de funcionários;
- Navegação dentro do app.

## Como conectar com o Banco de Dados
Antes de utilizar o sistema, é importante verificar se as variáveis no arquivo `db.php` estão corretas para o seu servidor. Modifique principalmente as linhas a seguir com o usuário, senha e porta do MySql adequadas.

```
  $username = "João";
  $password = "6768";
  $credencial = "1234"
```
## Script SQL

Execute o arquivo `db.sql` no banco de dados para criar o banco e adicionar um usuário e um cliente que será utilizado em operações básicas do sistema.

> [!IMPORTANT]
> Sem os dados corretos, podem ocorrer erros ao acessar as páginas que utilizam conexão com banco de dados.
> O banco de dados deve ser inserido na sua máquina para conseguir navegar dentro do App.


<p>
  <img src="https://raw.githubusercontent.com/hisabellippel/fast-sesi/refs/heads/main/asets/imagens/meio/kanban.png" width="800" alt="Evolução do projeto">
</p>

## Evoluçaõ do projeto
Neste quadro Kanban acima, você pode ver nossa evolução como equipe. Dentro dele está separados as principáis tarefas e seus membros atribuídos.

<p>
  <img src="https://raw.githubusercontent.com/hisabellippel/fast-sesi/refs/heads/main/asets/imagens/meio/kanban.png" width="800" alt="Evolução do projeto">
</p>

## SMTP API – Envio de E-mails via Servidor SMTP
Esta API fornece uma interface simples para envio de e-mails através de um servidor SMTP configurado.
Ela pode ser usada em sistemas internos, automações e integrações que necessitam enviar notificações, relatórios ou mensagens automáticas por e-mail.

## SMTP API - Funcionalidades
- Envio de e-mails em formato texto simples e HTML;
- Suporte a anexos (opcional);
- Registro de logs de envio;
- Suporte a autenticação SMTP (usuário/senha, TLS/SSL).

## SMTP API - Limitações
- O desempenho depende do servidor SMTP utilizado;
- Pode haver limite de envio diário imposto pelo provedor;
- O tamanho máximo de anexos pode ser limitado (geralmente <25MB);
- Não há fila de envio (e-mails são enviados sincronicamente);
- Requer autenticação válida do servidor SMTP configurado.