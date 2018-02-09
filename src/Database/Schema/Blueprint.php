<?php

namespace CleaniqueCoders\Blueprint\Macro\Database\Schema;

use CleaniqueCoders\Blueprint\Macro\Contracts\MacroContract;
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
        DefaultBlueprint::macro('addForeign', function ($key) {
            return $this->unsignedInteger($key)
                ->index();
        });

        DefaultBlueprint::macro('addNullableForeign', function ($key) {
            return $this->addForeign($key)->nullable();
        });

        DefaultBlueprint::macro('referenceOn', function ($key, $table, $references = 'id') {
            return $this->foreign($key)
                ->references($references)
                ->on($table);
        });

        DefaultBlueprint::macro('belongsTo', function ($key, $table, $references = 'id') {
            $this->addForeign($key);
            return $this->foreign($key)
                ->references($references)
                ->on($table);
        });

        DefaultBlueprint::macro('uuid', function ($length = 64) {
            return $this->string('uuid', $length);
        });

        DefaultBlueprint::macro('addAcceptance', function ($value) {
            $this->actedStatus('is_' . $value);
            $this->actedAt($value . '_at');
            $this->actedBy($value . '_by');
            $this->remarks($value . '_remarks');
            return $this;
        });

        DefaultBlueprint::macro('actedStatus', function ($value = 'is_acted') {
            return $this->boolean($value)->default(false);
        });

        DefaultBlueprint::macro('actedAt', function ($value = 'acted_at') {
            return $this->datetime($value)->nullable();
        });

        DefaultBlueprint::macro('actedBy', function ($value = 'acted_by') {
            return $this->unsignedInteger($value)->nullable();
        });

        DefaultBlueprint::macro('remarks', function ($value = 'remarks') {
            return $this->text($value)->nullable();
        });

        DefaultBlueprint::macro('hashslug', function () {
            return $this->string('hashslug')->nullable()->unique();
        });

        DefaultBlueprint::macro('slug', function () {
            return $this->string('slug')->nullable()->unique();
        });

        DefaultBlueprint::macro('label', function () {
            return $this->string('label')->nullable();
        });

        DefaultBlueprint::macro('name', function ($value = 'name') {
            return $this->string($value)->nullable();
        });

        DefaultBlueprint::macro('description', function () {
            return $this->text('description')->nullable();
        });

        DefaultBlueprint::macro('expired', function () {
            $this->boolean('is_expired')->default(false);
            $this->datetime('expired_at')->nullable();
            return $this;
        });

        DefaultBlueprint::macro('user', function () {
            $this->belongsTo('user_id', 'users');
            return $this;
        });

        DefaultBlueprint::macro('amount', function ($label = 'amount') {
            return $this->bigInteger($label)
                ->nullable()
                ->default(0);
        });

        DefaultBlueprint::macro('smallAmount', function ($label = 'amount') {
            return $this->integer($label)
                ->nullable()
                ->default(0);
        });

        DefaultBlueprint::macro('reference', function ($length = 32) {
            return $this->string('reference', $length)
                ->nullable()
                ->unique()
                ->index();
        });

        DefaultBlueprint::macro('standardTime', function () {
            $this->softDeletes();
            $this->timestamps();
        });
    }
}
