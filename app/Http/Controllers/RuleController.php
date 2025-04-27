<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRuleRequest;
use App\Http\Requests\UpdateRuleRequest;
use App\Services\RuleBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Kutabarik\SanitDb\Rules\RulesManager;

class RuleController extends Controller
{
    private RulesManager $rulesManager;

    public function __construct(
        private RuleBuilder $ruleBuilder,
    ) {
        $this->rulesManager = new RulesManager(storage_path('app/rules.json'));
    }

    public function index(): View
    {
        $rules = $this->rulesManager->all();

        return view('rules.index', compact('rules'));
    }

    public function create(): View
    {
        return view('rules.create');
    }

    public function store(StoreRuleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $rule = $this->ruleBuilder->fromArray($data);

        $this->rulesManager->addRule($data['table'], $rule);

        return redirect()->route('rules.index')->with('success', 'Rule added successfully.');
    }

    public function edit(string $table, int $index): View
    {
        $rules = $this->rulesManager->getTableRules($table);

        if (! isset($rules[$index])) {
            abort(404);
        }

        $rule = $rules[$index];

        return view('rules.edit', compact('table', 'index', 'rule'));
    }

    public function update(UpdateRuleRequest $request, string $table, int $index): RedirectResponse
    {
        $data = $request->validated();
        $rule = $this->ruleBuilder->fromArray($data);

        $this->rulesManager->updateRule($table, $index, $rule);

        return redirect()->route('rules.index')->with('success', 'Rule updated successfully.');
    }

    public function destroy(string $table, int $index): RedirectResponse
    {
        $this->rulesManager->deleteRule($table, $index);

        return redirect()->route('rules.index')->with('success', 'Rule deleted successfully.');
    }
}
