<?php

namespace CleaniqueCoders\Blueprint\Macro\Database\Schema;

use CleaniqueCoders\Blueprint\Macro\Contracts\MacroContract;
use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;

/**
 * Extended Blueprint by using Macro.
 */
class Blueprint implements MacroContract
{
    /**
     * Register Macros.
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

        DefaultBlueprint::macro('nullableBelongsTo', function ($key, $table, $references = 'id') {
            $this->addNullableForeign($key);

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

        DefaultBlueprint::macro('hashslug', function ($length = 64) {
            return $this->string('hashslug')
                ->length($length)
                ->nullable()
                ->unique()
                ->index();
        });

        DefaultBlueprint::macro('slug', function () {
            return $this->string('slug')
                ->nullable()
                ->unique()
                ->index();
        });

        DefaultBlueprint::macro('label', function ($label = 'label') {
            return $this->string($label)->nullable();
        });

        DefaultBlueprint::macro('name', function ($value = 'name') {
            return $this->string($value)->nullable();
        });

        DefaultBlueprint::macro('description', function ($label = 'description') {
            return $this->text($label)->nullable();
        });

        DefaultBlueprint::macro('expired', function () {
            $this->boolean('is_expired')->default(false);
            $this->datetime('expired_at')->nullable();

            return $this;
        });

        DefaultBlueprint::macro('user', function ($nullable = false) {
            if($nullable) {
                $this->nullableBelongsTo('user_id', 'users');
            } else {
                $this->belongsTo('user_id', 'users');
            }
            
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

        DefaultBlueprint::macro('reference', function ($label = 'reference', $length = 64) {
            return $this->string('reference', $length)
                ->nullable()
                ->unique()
                ->index();
        });

        DefaultBlueprint::macro('standardTime', function () {
            $this->softDeletes();
            $this->timestamps();
        });

        DefaultBlueprint::macro('code', function ($key = 'code', $length = 20) {
            return $this->string($key, $length)
                ->nullable()
                ->unique()
                ->index();
        });

        DefaultBlueprint::macro('status', function ($key = 'status', $default = true) {
            return $this->boolean($key)->default($default);
        });

        DefaultBlueprint::macro('is', function ($key = 'active', $default = true) {
            return $this->status('is_' . $key, $default);
        });

        DefaultBlueprint::macro('ordering', function ($key = 'ordering', $length = 10) {
            return $this->string($key, $length)
                ->nullable();
        });

        DefaultBlueprint::macro('percent', function ($key = 'percent') {
            return $this->decimal($key, 5, 2)->default(0);
        });
    }
}
