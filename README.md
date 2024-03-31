Book Library Management System

My library management system intends to the librarian to control the books and its borrowed-return process by which member. I mainly develop backend data not UI. If I get more time, I can develop best UI by using special components. In this test case, please regard yourself as a librarian.

1. Book Management Section
   In this section, you can see the books list and each book details. You also can search the book you want to borrow and see if the book is available or not. If the book is unavailable, available date is shown.

2. Circulation Management Section
   a). Borrow Book
   When a library member borrow books, you can mark the books details and generate due date and price. (validation included) Then, return an invoice and borrowing facts. In this case, already borrowed books are not shown in the book list. Unavailable books are also shown in this section with their available dates.

b). Borrowed Book List
In this section , you can see the borrowing facts by a members. If the member return the book back to the library, you can click the return back button.

c). History
You can see the history of all borrowed-return process in this section.

3. User Management
   You can register a librarian or member and see the list of all users.

4 Dashboard
In the dashboard section, counts of user, author & books are shown. Recently action of 5 books are displayed on the table and top borrowed books are described on the pie chart.

5. Librarian Authentication & Authorization (included middleware)
   Librian account => Email : exampleuser@gmail.com Password : exampleuser123@

<!-- Steps -->

1 Clone the project from the repository => git clone https://github.com/thaethae-nikkoo/book-library 2. run the command composer install 3. Create a database and setup in .env file 4. Open app.php under config directory and then change time zone
'timezone' => 'Asia/Yangon' 5. php artisan migrate:fresh --seed 6. php artisan storage:link 7. php artisan serve

To login
Email : exampleuser@gmail.com
Password : exampleuser123@
