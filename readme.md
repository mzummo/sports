#### Code Notes (Things that can make it better):

* could impliment vue router
* could impliment vuex (would help with communicating state between components if I made the app multi-component)
* 3 ways to implment AUTH 
    - regular Laravel AUTH with redirect to guarded web routes/ protected api routes
    - use vue router to create a login page, authentication based on laravel AUTH with function which checks session on front-end and (return error on api if not valid session)
    - use JWT (passport, etc..)
* could optimize my functions to keep things DRY
* could add error handing (ex: failed promise could return toastr message)
* player-list could be implimented better with say a bootstrap-table component
* UI changes (top and left hand NAV)

-- left some previous attempt code (unused) and also commented out sections of code (ON PURPOSE)

#### Installation (DEV):
```bash
# composer install
# copy .env.example -> .env (change accordingly)
# php artisan migrate --seed
# npm install
# npm run dev
```