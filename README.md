https://github.com/laravel98developer/laravel-hiring-projects/tree/master/Projects/7learn/P1

برای موجودیت پست، دسته و تگ مدل و مایگریشن هایی ایجاد کن با شرایط زیر

هر تگ یک دسته دارد
هر پست میتواند بینهایت تگ داشته باشد
هر دسته بینهایت تگ دارد



در این پروژه یک seed ایجاد کن که در آن یک میلیون پست فیک ایجاد میکند
هر پست بین 2 تا 10 تگ
هر تگ متعلق به 2 تا8 دسته


یک seed برای 20 تگ
یکی برای 20 دسته


در لاراول و پایگاه‌داده‌ها، منظور از Batch Insert اینه که به جای اینکه رکوردها رو یکی‌یکی در دیتابیس ذخیره کنیم، یک آرایه از چندین رکورد رو با یک دستور SQL INSERT به‌صورت دسته‌جمعی وارد دیتابیس کنیم.
اگه اینو برای ۱ میلیون رکورد تکی انجام بدی یعنی ۱ میلیون بار رفت و برگشت بین برنامه و دیتابیس! ولی با Batch Insert می‌تونی مثلاً هر ۱۰۰۰ تا رکورد رو با فقط یک کوئری بفرستی.



php artisan migrate


php artisan queue:work
