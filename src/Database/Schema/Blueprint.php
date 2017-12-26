<?php

namespace CLNQCDRS\Blueprint\Macro\Database\Schema;

use CLNQCDRS\Blueprint\Macro\Contracts\MacroContract;
use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/**
 * Extended Blueprint by using Macro
 */
class Blueprint implements MacroContract
{
    /**
     * Register Macros
     *
     * @void
     */
    public static function registerMacros()
    {
        DefaultBlueprint::macro('addForeign', function ($key, $table) {
            return $this->unsignedInteger($key)
                ->index();
        });

        DefaultBlueprint::macro('addNullableForeign', function ($key, $table) {
            return $this->addForeign($key, $table)->nullable();
        });

        DefaultBlueprint::macro('referenceOn', function ($key, $table, $references = 'id') {
            return $this->foreign($key)
                ->references($references)
                ->on($table);
        });

        DefaultBlueprint::macro('addAcceptance', function ($value) {
            $this->boolean('is_' . $value)->default(false);
            $this->datetime($value . '_at')->nullable();
            $this->integer($value . '_by')->nullable();
            $this->text($value . '_remarks')->nullable();
        });

        DefaultBlueprint::macro('hashslug', function () {
            $this->string('hashslug')->nullable()->unique();
        });

        DefaultBlueprint::macro('slug', function () {
            $this->string('slug')->nullable()->unique();
        });

        DefaultBlueprint::macro('label', function () {
            $this->string('label')->nullable();
            $this->string('name')->nullable();
        });

        DefaultBlueprint::macro('description', function () {
            $this->text('description')->nullable();
        });

        DefaultBlueprint::macro('expired', function () {
            $this->boolean('is_expired')->default(false);
            $this->datetime('expired_at')->nullable();
        });

        DefaultBlueprint::macro('user', function () {
            $this->addForeign('user_id', 'users');
            $this->referenceOn('user_id', 'users');
        });

        DefaultBlueprint::macro('amount', function ($label = 'amount') {
            $this->bigInteger($label)->nullable()->default(0);
        });

        DefaultBlueprint::macro('smallAmount', function ($label = 'amount') {
            $this->integer($label)->nullable()->default(0);
        });

        DefaultBlueprint::macro('reference', function () {
            $this->string('reference')->nullable()->unique()->index();
        });

        DefaultBlueprint::macro('standardTime', function () {
            $this->softDeletes();
            $this->timestamps();
        });
    }
}
