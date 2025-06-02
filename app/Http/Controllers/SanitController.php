<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Kutabarik\SanitDb\Rules\RulesManager;
use Kutabarik\SanitDb\SanitDb;

class SanitController extends Controller
{
    public function __construct(
        private readonly SanitDb $sanitDb,
        private readonly RulesManager $rulesManager
    ) {}

    public function showRun(RulesManager $rulesManager): View
    {
        $rules = $rulesManager->getAll();

        return view('sanit.run-start', compact('rules'));
    }

    public function run(Request $request, RulesManager $rulesManager, SanitDb $sanitDb): View
    {
        $selected = $request->input('rules', []);
        $rules = $rulesManager->getAll();

        $filtered = array_filter($rules, fn ($r) => in_array($r->name, $selected));
        $results = $sanitDb->processRules($filtered);

        return view('sanit.run-results', compact('results'));
    }

    public function delete(Request $request, SanitDb $sanitDb): RedirectResponse
    {
        $encoded = $request->input('results');
        $results = json_decode(base64_decode($encoded), true);

        if (! is_array($results)) {
            return redirect()->back()->with('error', 'Invalid results data.');
        }

        $deleted = $sanitDb->deleteFromResults($results);

        return redirect()->route('sanit.showRun')->with('success', "Deleted {$deleted} rows.");
    }
}
