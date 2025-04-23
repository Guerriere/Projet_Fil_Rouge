<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles'; // Assurez-vous que le nom de votre table de rôles est 'roles' (ou le nom que vous avez choisi).

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id'; // Par défaut, c'est 'id'.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'description']; // Les champs que vous autorisez à être remplis.

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Define the many-to-many relationship with the User model.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
        // 'role_user' est le nom de la table pivot qui lie les rôles aux utilisateurs.
        // 'role_id' est la clé étrangère dans la table pivot qui référence l'ID du rôle.
        // 'user_id' est la clé étrangère dans la table pivot qui référence l'ID de l'utilisateur.
    }

    // Vous pouvez ajouter d'autres méthodes spécifiques aux rôles ici, par exemple :
    // public function isAdmin() {
    //     return $this->nom === 'admin';
    // }

    // public function hasPermission($permission) {
    //     // Logique pour vérifier si le rôle a une certaine permission (si vous avez une table de permissions)
    // }
}
