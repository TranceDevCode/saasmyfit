<?php

namespace Database\Seeders;

use App\Models\Management\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            [
                'id' => 1,
                'name' => 'Listar Alumnos',
                'description' => 'Lista todos los alumnos en la tabla, lo cual permitira buscarlos, filtrarlos.',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Ver Alumnos',
                'description' => 'Permite ver los detalles de los alumnos en la tabla, lo cual permitira buscarlos.',
                'created_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'Crear Alumnos',
                'description' => 'Permite Crear el registro de nuevos alumnos en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'Editar Alumnos',
                'description' => 'Permite editar o actualizar el registro de nuevos alumnos en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'Eliminar Alumnos',
                'description' => 'Permite eliminar el registro de alumnos en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 6,
                'name' => 'Listar Notificaciones',
                'description' => 'Permite Listar las notificaciones enviadas a los alumnos gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 7,
                'name' => 'Ver Notificaciones',
                'description' => 'Permite ver el detalle de los notificaciones enviadas a los alumnos gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 8,
                'name' => 'Crear Notificaciones',
                'description' => 'Permite crear nuevas notificaciones para enviar a los alumnos del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 9,
                'name' => 'Editar Notificaciones',
                'description' => 'Permite editar o modificar una notificación enviada.',
                'created_at' => now()
            ],
            [
                'id' => 10,
                'name' => 'Eliminar Notificaciones',
                'description' => 'Permite eliminar el registro de una o mas notificaciones enviadas.',
                'created_at' => now()
            ],
            [
                'id' => 11,
                'name' => 'Listar Rutinas',
                'description' => 'Permita Listar, buscar, filtrar las rutinas del gimnasio',
                'created_at' => now()
            ],
            [
                'id' => 12,
                'name' => 'Ver Rutinas',
                'description' => 'Permite ver el detalle de las rutinas.',
                'created_at' => now()
            ],
            [
                'id' => 13,
                'name' => 'Crear Rutinas',
                'description' => 'Permite Crear nuevas rutinas para los alumnos en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 14,
                'name' => 'Editar Rutinas',
                'description' => 'Permite editar o actualziar las rutinas para los alumnos en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 15,
                'name' => 'Eliminar Rutinas',
                'description' => 'Permite eliminar las rutinas para los alumnos en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 16,
                'name' => 'Listar Ejercicios',
                'description' => 'Permita listar, buscar, filtrar los ejercicios creados.',
                'created_at' => now()
            ],
            [
                'id' => 17,
                'name' => 'Ver Ejercicios',
                'description' => 'Permite ver el detalle de los ejercicios.',
                'created_at' => now()
            ],
            [
                'id' => 18,
                'name' => 'Crear Ejercicios',
                'description' => 'Permite crear nuevos ejercicios en el gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 19,
                'name' => 'Editar Ejercicios',
                'description' => 'Permite Editar o Actualizar los ejercicios.',
                'created_at' => now()
            ],
            [
                'id' => 20,
                'name' => 'Eliminar Ejercicios',
                'description' => 'Permite eliminar el registro de los ejercicios.',
                'created_at' => now()
            ],
            [
                'id' => 21,
                'name' => 'Listar Dietas',
                'description' => 'Permite Listar las dietas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 22,
                'name' => 'Ver Dietas',
                'description' => 'Permite ver el detalle de las dietas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 23,
                'name' => 'Crear Dietas',
                'description' => 'Permite Crear nuevas dietas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 24,
                'name' => 'Editar Dietas',
                'description' => 'Permite editar o actualizar los dietas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 25,
                'name' => 'Eliminar Dietas',
                'description' => 'Permite eliminar las dietas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 26,
                'name' => 'Listar Permisos',
                'description' => 'Permite Listar los Permisos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 27,
                'name' => 'Ver Permisos',
                'description' => 'Permite ver el detalle de los permisos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 28,
                'name' => 'Crear Permisos',
                'description' => 'Permite Crear nuevos permisos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 29,
                'name' => 'Editar Permisos',
                'description' => 'Permite editar o actualizar los permisos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 30,
                'name' => 'Eliminar Permisos',
                'description' => 'Permite eliminar el registro de los permisos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 31,
                'name' => 'Listar Planes',
                'description' => 'Permite Listar las planes del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 32,
                'name' => 'Ver Planes',
                'description' => 'Permite ver los detalles del Plan del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 33,
                'name' => 'Crear Planes',
                'description' => 'Permite Crear nuevas planes del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 34,
                'name' => 'Editar Planes',
                'description' => 'Permite Editar o Actualizar los planes del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 35,
                'name' => 'Eliminar Planes',
                'description' => 'Permite eliminar los planes del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 36,
                'name' => 'Listar Medios de Pagos',
                'description' => 'Permite Listar las medios de pago del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 37,
                'name' => 'Ver Medios de Pagos',
                'description' => 'Permite ver el detalle de los medios de pago del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 38,
                'name' => 'Crear Medios de Pagos',
                'description' => 'Permite Crear nuevos medios de pago del gimnasio y/o sistema.',
                'created_at' => now()
            ],
            [
                'id' => 39,
                'name' => 'Editar Medios de Pagos',
                'description' => 'Permite Editar o Actualizar los medios de pago del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 40,
                'name' => 'Eliminar Medios de Pagos',
                'description' => 'Permite eliminar los medios de pago del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 41,
                'name' => 'Listar Ingresos',
                'description' => 'Permite Listar las ingresos del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 42,
                'name' => 'Ver Ingresos',
                'description' => 'Permite ver el detalle de los ingresos del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 43,
                'name' => 'Crear Ingresos',
                'description' => 'Permite Crear nuevos ingresos del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 44,
                'name' => 'Editar Ingresos',
                'description' => 'Permite Editar o Actualizar los ingresos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 45,
                'name' => 'Eliminar Ingresos',
                'description' => 'Permite eliminar los ingresos registros del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 46,
                'name' => 'Listar Egresos',
                'description' => 'Permite Listar las Egresos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 47,
                'name' => 'Ver Egresos',
                'description' => 'Permite ver el detalle de los Egresos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 48,
                'name' => 'Crear Egresos',
                'description' => 'Permite Crear nuevos Egresos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 49,
                'name' => 'Editar Egresos',
                'description' => 'Permite Editar o Actualizar los Egresos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 50,
                'name' => 'Eliminar Egresos',
                'description' => 'Permite eliminar los registros de Egresos del sistema.',
                'created_at' => now()
            ],
            [
                'id' => 51,
                'name' => 'Listar Maquinas',
                'description' => 'Permite Listar las maquinas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 52,
                'name' => 'Ver Maquinas',
                'description' => 'Permite ver los detalles del registro de las maquinas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 53,
                'name' => 'Crear Maquinas',
                'description' => 'Permite Crear nuevos maquinas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 54,
                'name' => 'Editar Maquinas',
                'description' => 'Permite Editar o Actualizar los maquinas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 55,
                'name' => 'Eliminar Maquinas',
                'description' => 'Permite eliminar los registros de maquinas del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 56,
                'name' => 'Listar Proveedores',
                'description' => 'Permite Listar, buscar y filtrar los proveedores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 57,
                'name' => 'Ver Proveedores',
                'description' => 'Permite ver los detalles del proveedores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 58,
                'name' => 'Crear Proveedores',
                'description' => 'Permite Crear o Editar proveedores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 59,
                'name' => 'Editar Proveedores',
                'description' => 'Permite Editar o Actualizar los proveedores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 60,
                'name' => 'Eliminar Proveedores',
                'description' => 'Permite eliminar los proveedores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 61,
                'name' => 'Listar Trabajadores',
                'description' => 'Permite Listar las trabajadores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 62,
                'name' => 'Ver Trabajadores',
                'description' => 'Permite ver los detalles del trabajadores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 63,
                'name' => 'Crear Trabajadores',
                'description' => 'Permite Crear o Editar trabajadores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 64,
                'name' => 'Editar Trabajadores',
                'description' => 'Permite Editar o Actualizar trabajadores del gimnasio.',
                'created_at' => now()
            ],
            [
                'id' => 65,
                'name' => 'Eliminar Trabajadores',
                'description' => 'Permite eliminar los trabajadores del gimnasio.',
                'created_at' => now()
            ],
        ]);
    }
}
