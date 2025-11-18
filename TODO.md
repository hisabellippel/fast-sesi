# TODO for Modifying paginaAlterarPerfil.php

- [x] Remove the access denial block for non-ADM users.
- [x] Modify the SQL query to fetch all employees for ADM, or only the current user for others.
- [x] Adjust the display logic: for ADM, show all profiles with edit/delete; for others, show only their own profile with edit only.
- [x] Hide the "Cadastrar Novo Funcionário" button for non-ADM users.
- [x] Hide delete buttons in tables for non-ADM users.
- [x] Test the changes by logging in as different roles.
