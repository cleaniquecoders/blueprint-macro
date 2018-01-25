## About Your Package

Tell people about your package

## Installation

```
$ composer require cleanique-coders/blueprint-macro --dev
```

## Usage

Available macros:

1. Add Foreign Key (FK) - Normally we need to add foreign key to a table, and it's quite long and hard to maintain across your migrations.

```php
$table->addForeign('user_id', 'users');
```

> Please take note, this is for `unsignedInteger`. Contribution much appreciated to support all other type of data type.

2. Add Nullable Foreign Key (FK) - There's situation when your FK need to nullable. So this macro is for your, similar usage as `addForeign` macro.

```php
$table->addNullableForeign('user_id', 'users');
```

3. Reference On - This macro is to setup the reference of the FK.

```php
$table->referenceOn('user_id', 'users');
```

4. UUID - Another type of identifier for a resource. Default length is 64. But you may pass a length for the first argument.

```php
$table->uuid(128);
```

5. Add Acceptance - Usually when get approval, verification, certification or requests, we have some sort of basic information we want to store. For instance, when I want to apply a leave, I want to store is it accepted or not, at what time it is approved or reject, who's the approver? and possibily some remarks. So `addAcceptance` can be read as `is_approved`, `approved_at`, `approved_by` and `approved_remarks`.

Basically it will create for columns with it's own responsbility:

1. `is_` - A boolean type, good for quick check, true or false.
2. `_at` - A date time type, good for storing when the event occured.
3. `_by` - A FK to users table by default intention, but you may add `referenceOn` to other table if you need to. This is basically to know who did the acceptance.
4. `_remarks` - Of course, a remark for the event.

```php
$table->addAcceptance('approved');
$table->addAcceptance('rejected');
$table->addAcceptance('applied');
```

6. Acted Status - Determine the status of the act, simply true or false.

```php
$table->actedStatus('is_approved');
$table->actedStatus('is_rejected');
$table->actedStatus('activated');
```

7. Acted At - You want to store date time of the act event.

```php
$table->actedAt('approved_at');
$table->actedAt('rejected_at');
$table->actedAt('activated_at');
```

8. Acted By - You want to store who's did that action.

```php
$table->actedBy('approved_by');
$table->actedBy('rejected_by');
$table->actedBy('activated_by');
```

9. Remarks - Store remarks, you may override default field name by passing the field name at first argument.

```php
$table->remarks();
$table->remarks('approved_remark');
```

10. Hashslug - You probably want store the hashed slug, useful if you don't want to rely on incremental id or you want a unique and randomised identifier.

```php
$table->hashslug();
```

11. Slug - Store slug format (`something-like-this`) in your table.

```php
$table->slug();
```

12. Label 

```php
$table->label();
```

13. Name 

```php
$table->name();
$table->name('first_name');
$table->name('last_name');
```

13. Description

```php
$table->description();
```

14. Expired - Expiry fields.

```php
$table->expired();
```

15. User - most common FK setup with Reference.

```php
$table->user();
```

16. Amount - Use this for money. Optionally can set other field name.

```php
$table->amount('fee');
```

17. Small Amount - Use for money, but with smaller range.

```php
$table->smallAmount('discount');
```

18. Reference - You may want to have reference field for your documents.

```php
$table->reference();
```

19. Standard Time - consist of `softDeletes()` and `timestamps()`

```php
$table->standardTime();
```

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).