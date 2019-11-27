<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $fillable = ['fname', 'lname', 'email', 'group1', 'group2', 'group3', 'group4', 'group5', 'group6', 'group7', 'hash', 'ip', 'ipcheck', 'status'];
}
