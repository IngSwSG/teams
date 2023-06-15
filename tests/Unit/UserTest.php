<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Utiliza la base de datos en memoria para las pruebas

    public function test_delete_user()
    {
        /* // Crea un usuario de ejemplo en la base de datos
        $user = User::factory()->create();

        // Simula una solicitud DELETE a la ruta de eliminación del usuario
        $response = $this->delete(route('users.destroy', ['user' => $user->id])); */

        $user = User::factory()->create();
        $response =  $this->actingAs($user)->delete(route('users.destroy', ['user' => $user->id]));


        // Verifica que el usuario haya sido eliminado correctamente
        $this->assertDatabaseMissing('users', ['id' => $user->id]);

        // Verifica que se haya redirigido a la página de usuarios después de la eliminación
        $response->assertRedirect(route('users.index'));
    }

    public function testclasificarPorEquipo()
    {
    
        $user = User::factory()->create();

        User::factory()->create(['job' => 'Programador']);
        User::factory()->create(['job' => 'Diseñador']);
        User::factory()->create(['job' => 'Tester']);

        // Hacer una solicitud GET a la ruta de clasificación
        $response = $this->actingAs($user)->get(route('users.equipos'));
    
    
        // Verificar que la respuesta contenga los datos esperados en la vista
        $response->assertSeeText('Equipos');
        $response->assertSeeText('Programador');
        $response->assertSeeText('1');
    }
}