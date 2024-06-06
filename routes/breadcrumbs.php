<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', url('/'));
});

// login
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});

// usuarios
Breadcrumbs::for('usuarios.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('usuarios.index'));
});
Breadcrumbs::for('usuarios.create', function (BreadcrumbTrail $trail) {
    $trail->parent('usuarios.index');
    $trail->push('Nuevo', route('usuarios.create'));
});
Breadcrumbs::for('usuarios.edit', function (BreadcrumbTrail $trail,$user) {
    $trail->parent('usuarios.index');
    $trail->push('Editar', route('usuarios.edit',$user->id));
});

// comunidad
Breadcrumbs::for('comunidad.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Comunidad', route('comunidad.index'));
});
Breadcrumbs::for('comunidad.create', function (BreadcrumbTrail $trail) {
    $trail->parent('comunidad.index');
    $trail->push('Nuevo', route('comunidad.create'));
});
Breadcrumbs::for('comunidad.edit', function (BreadcrumbTrail $trail,$user) {
    $trail->parent('comunidad.index');
    $trail->push('Editar', route('comunidad.edit',$user->id));
});

// comercios
Breadcrumbs::for('comercios.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Comercios', route('comercios.index'));
});
Breadcrumbs::for('comercios.create', function (BreadcrumbTrail $trail) {
    $trail->parent('comercios.index');
    $trail->push('Nuevo', route('comercios.create'));
});
Breadcrumbs::for('comercios.edit', function (BreadcrumbTrail $trail,$model) {
    $trail->parent('comercios.index');
    $trail->push('Editar', route('comercios.edit',$model->id));
});


// dispositivos
Breadcrumbs::for('dispositivos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dispositivos', route('dispositivos.index'));
});
Breadcrumbs::for('dispositivos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dispositivos.index');
    $trail->push('Nuevo', route('dispositivos.create'));
});
Breadcrumbs::for('dispositivos.edit', function (BreadcrumbTrail $trail,$model) {
    $trail->parent('dispositivos.index');
    $trail->push('Editar', route('dispositivos.edit',$model->id));
});

// lecturas

Breadcrumbs::for('lecturas.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Lecturas', route('lecturas.index'));
});
Breadcrumbs::for('lecturas.create', function (BreadcrumbTrail $trail) {
    $trail->parent('lecturas.index');
    $trail->push('Nuevo', route('lecturas.create'));
});
Breadcrumbs::for('lecturas.edit', function (BreadcrumbTrail $trail,$model) {
    $trail->parent('lecturas.index');
    $trail->push('Editar', route('lecturas.edit',$model->id));
});