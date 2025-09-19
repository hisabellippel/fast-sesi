# TODO List for Access Control Implementation

## Completed Tasks
- [x] Restrict access to paginaAlterarPerfil.php to admin users only
- [x] Allow admin users to view and edit all employee profiles
- [x] Allow non-admin users to edit only their own profiles
- [x] Fetch user role (cargo_funcionario) from database on each page load to ensure accuracy
- [x] Implement role-based access control in paginaAlterarPerfil.php
- [x] Implement role-based editing restrictions in paginaAlterarPerfil2.php

## Followup Steps
- [ ] Test the access control by logging in as admin and non-admin users
- [ ] Verify that admin can access paginaAlterarPerfil.php and edit any profile
- [ ] Verify that non-admin users are denied access to paginaAlterarPerfil.php
- [ ] Verify that non-admin users can edit only their own profile via direct link
- [ ] Ensure no security vulnerabilities in the implementation
