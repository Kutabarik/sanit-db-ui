<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kutabarik\SanitDb\Database\EloquentRepository;
use Kutabarik\SanitDb\SanitDb;

class RuleController extends Controller
{
    public function __construct(
        private EloquentRepository $sanitRepository
    ) {
    }
    public function index() {
        $sanitDb = new SanitDb($this->sanitRepository);

        $result = $sanitDb->process(storage_path('app/private/rules.json'));

        dd($result);
    }
}
