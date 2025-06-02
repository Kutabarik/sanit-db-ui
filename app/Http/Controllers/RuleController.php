<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRuleRequest;
use App\Http\Requests\UpdateRuleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Kutabarik\SanitDb\Rules\RuleDTO;
use Kutabarik\SanitDb\Rules\RulesManager;
use Kutabarik\SanitDb\SanitDb;

class RuleController extends Controller
{
    public function __construct(
        private readonly SanitDb      $sanitDb,
        private readonly RulesManager $rulesManager
    ) {}

    public function index(): View
    {
        $rules = $this->rulesManager->getAll();

        return view('rules.index', compact('rules'));
    }

    public function create(): View
    {
        return view('rules.create');
    }

    public function store(StoreRuleRequest $request): RedirectResponse
    {
        $rule = RuleDTO::fromArray($request->validated());

        $this->rulesManager->save($rule);

        return redirect()->route('rules.index')->with('success', 'Rule added.');
    }

    public function edit(string $name): View
    {
        $rule = $this->rulesManager->get($name);

        if (! $rule) {
            abort(404, 'Rule not found');
        }

        return view('rules.edit', compact('rule'));
    }

    public function update(UpdateRuleRequest $request, string $name): RedirectResponse
    {
        $updated = RuleDTO::fromArray($request->validated());
        $this->rulesManager->save($updated);

        return redirect()->route('rules.index')->with('success', 'Rule updated.');
    }

    public function destroy(string $name): RedirectResponse
    {
        $this->rulesManager->delete($name);

        return redirect()->route('rules.index')->with('success', 'Rule deleted.');
    }
}
