### v1.6.1 - 11/06/2018

- Allow overwrite column name for `description($label)`
- Allow nullable `user($nullable)`
- Allow overwrite column name for reference and increase default length from 32 to 64: `reference($label, $length)`
- Set default length for hashslug is 64 characters, and add as index
- Allow `label()` name to be overwrite
- Added indexing on `slug()`
- Added `nullableBelongsTo('fk_id', 'fk_table')`
- Added `code()`
- Added `status()`
- Added `is('active')`
- Added `ordering()`
- Added `percent()`