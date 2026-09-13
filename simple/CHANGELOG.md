add: plugin php intelliphense
disable: @builtin php language features


made vite reload when .blade.php files change
- vite only checked for changes on typescript files and css (?) (vite.config.ts)
+ 
npm install --save-dev laravel-vite-plugin
in reality i was missing:
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  on the .blade.php file