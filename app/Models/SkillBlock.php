<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillBlock extends Model
{
    protected $primaryKey = 'block_id';
    public $timestamps = false;

    protected $fillable = ['title', 'level', 'subject_id'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'subject_id', 'subject_id');
    }
}
