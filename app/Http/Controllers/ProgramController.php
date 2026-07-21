<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::active()->ordered()->get();

        return view('site.programs.index', compact('programs'));
    }

    public function show(Program $program)
    {
        abort_unless($program->is_active, 404);

        return view('site.programs.show', compact('program'));
    }
}
