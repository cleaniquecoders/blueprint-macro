<?php

namespace CleaniqueCoders\Blueprint\Macro\Database\Schema;

use CleaniqueCoders\Blueprint\Macro\Contracts\MacroContract;
use Illuminate\Database\Schema\Blueprint as DefaultBlueprint;
use Illuminate\Support\Str;

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
        /*
         * Foreign Key
         */
        DefaultBlueprint::macro('addForeign', function ($table, $options = []) {
            $fk = (isset($options['fk']) && ! empty($options['fk'])) ?
                $options['fk'] : Str::lower(Str::singular($table)) . '_id';

            $reference = (isset($options['reference']) && ! empty($options['reference'])) ?
                $options['reference'] : 'id';

            if (isset($options['bigInteger']) && true == $options['bigInteger']) {
                $schema = $this->unsignedBigInteger($fk)->index();
            } else {
                $schema = $this->unsignedInteger($fk)->index();
            }

            if (isset($options['nullable']) && true == $options['nullable']) {
                $schema->nullable();
            }

            if (! isset($options['no_reference'])) {
                $this->referenceOn($fk, $table, $reference);
            }

            return $schema;
        });

        DefaultBlueprint::macro('addNullableForeign', function ($table, $fk, $bigInteger = false) {
            return $this->addForeign($table, ['nullable' => true, 'fk' => $fk, 'bigInteger' => $bigInteger])->comment('Nullable FK for ' . $table);
        });

        DefaultBlueprint::macro('referenceOn', function ($key, $table, $reference = 'id') {
            return $this->foreign($key)
                ->references($reference)
                ->on($table);
        });

        DefaultBlueprint::macro('belongsTo', function ($table, $key = null, $bigInteger = false, $reference = 'id') {
            if (is_null($key)) {
                $key = Str::lower(Str::singular($table)) . '_id';
            }

            return $this->addForeign($table, ['fk' => $key, 'reference' => $reference, 'bigInteger' => $bigInteger])->comment('FK for ' . $table);
        });

        DefaultBlueprint::macro('nullableBelongsTo', function ($table, $key = null, $bigInteger = false, $reference = 'id') {
            if (is_null($key)) {
                $key = Str::lower(Str::singular($table)) . '_id';
            }

            return $this->addNullableForeign($table, $key, $bigInteger);
        });

        /*
         * Common Setup
         */
        DefaultBlueprint::macro('user', function ($nullable = false) {
            return $this->addForeign('users', ['nullable' => $nullable])->comment('Owner of the record.');
        });

        DefaultBlueprint::macro('standardTime', function () {
            $this->softDeletes();
            $this->timestamps();
        });

        /*
         * Identifier Replacement
         */
        DefaultBlueprint::macro('uuid', function ($length = 64) {
            return $this->string('uuid', $length)->comment('UUID');
        });

        DefaultBlueprint::macro('hashslug', function ($length = 64) {
            return $this->string('hashslug')
                ->length($length)
                ->nullable()
                ->unique()
                ->index()
                ->comment('Hashed Slug');
        });

        DefaultBlueprint::macro('slug', function () {
            return $this->string('slug')
                ->nullable()
                ->unique()
                ->index()
                ->comment('Slug');
        });

        /*
         * Short String
         */
        DefaultBlueprint::macro('label', function ($value = 'label', $length = 255) {
            return $this->string($value, $length)->nullable()->comment($value);
        });

        DefaultBlueprint::macro('name', function ($value = 'name', $length = 255) {
            return $this->string($value, $length)->nullable()->comment($value);
        });

        DefaultBlueprint::macro('code', function ($key = 'code', $length = 20) {
            return $this->string($key, $length)
                ->nullable()
                ->index()
                ->comment('Code');
        });

        DefaultBlueprint::macro('reference', function ($label = 'reference', $length = 64) {
            return $this->string('reference', $length)
                ->nullable()
                ->unique()
                ->index()
                ->comment('Reference');
        });

        /*
         * Long String
         */
        DefaultBlueprint::macro('remarks', function ($value = 'remarks') {
            return $this->text($value)->nullable()->comment('Remarks');
        });

        DefaultBlueprint::macro('description', function ($label = 'description') {
            return $this->text($label)->nullable()->comment('Description');
        });

        /*
         * Acceptance
         */
        DefaultBlueprint::macro('addAcceptance', function ($value, $table_by = 'users') {
            $this->is($value);
            $this->at($value);
            $this->by($table_by, $value);
            $this->remarks($value . '_remarks');

            return $this;
        });

        DefaultBlueprint::macro('status', function ($key = 'status', $default = true) {
            return $this->boolean($key)->default($default)->comment('Status');
        });

        DefaultBlueprint::macro('is', function ($key = 'activated', $default = true, $prefix = 'is_') {
            return $this->status($prefix . $key, $default)->comment('Is it ' . $key . '?');
        });

        DefaultBlueprint::macro('at', function ($key = 'activated', $suffix = '_at') {
            return $this->datetime($key . $suffix)->nullable()->comment('Event occured at Date & Time');
        });

        DefaultBlueprint::macro('by', function ($table, $key = null, $nullable = true, $bigInteger = false, $suffix = '_by') {
            return $this->addForeign($table, [
                'fk'         => (! is_null($key) ? $key . $suffix : null),
                'nullable'   => $nullable,
                'bigInteger' => $bigInteger,
            ]);
        });

        // will be deprecated
        DefaultBlueprint::macro('actedStatus', function ($value = 'is_acted') {
            return $this->boolean($value)->default(false)->comment('Action statys in Boolean');
        });

        // will be deprecated
        DefaultBlueprint::macro('actedAt', function ($value = 'acted_at') {
            return $this->datetime($value)->nullable()->comment('Acted at Date & Time');
        });

        // will be deprecated
        DefaultBlueprint::macro('actedBy', function ($value = 'acted_by') {
            return $this->unsignedInteger($value)->nullable()->comment('Done / Acted by an actor');
        });

        /*
         * Money
         */
        DefaultBlueprint::macro('amount', function ($label = 'amount') {
            return $this->bigInteger($label)
                ->nullable()
                ->default(0)
                ->comment('Big amount of money');
        });

        DefaultBlueprint::macro('smallAmount', function ($label = 'amount') {
            return $this->integer($label)
                ->nullable()
                ->default(0)
                ->comment('Small amount of money');
        });

        /*
         * Misc.
         */
        DefaultBlueprint::macro('ordering', function ($key = 'ordering', $length = 10) {
            return $this->string($key, $length)
                ->nullable()
                ->comment('Ordering');
        });

        DefaultBlueprint::macro('percent', function ($key = 'percent') {
            return $this->decimal($key, 5, 2)->default(0)->comment('Percentage');
        });

        DefaultBlueprint::macro('expired', function () {
            $this->boolean('is_expired')->default(false)->comment('Is Expired in Boolean');
            $this->datetime('expired_at')->nullable()->comment('Expired Date Time');

            return $this;
        });
    }
}
