Database: `PERPUSTAKAAN_TI4B`

| TBL_BOOKS         |                                                              |
| ----------------- | ------------------------------------------------------------ |
| `Id_Book`         | int(11) NOT NULL,                                            |
| `Title`           | varchar(255) NOT NULL,                                       |
| `Author`          | varchar(255) NOT NULL,                                       |
| `Publisher`       | varchar(255) NOT NULL,                                       |
| `PublicationYear` | year(4) NOT NULL,                                            |
| `Genre`           | varchar(100) NOT NULL,                                       |
| `Status`          | enum('Available','Reserved','Lost') NOT NULL DEFAULT 'Available', |
| `RackLocation`    | enum('Rack 1','Rack 2','Rack 3','Rack 4') NOT NULL,          |
| `ISBN`            | varchar(100) NOT NULL,                                       |
| `NumberOfCopies`  | int(3) NOT NULL                                              |



| TBL_MEMBER         |                                                      |
| ------------------ | ---------------------------------------------------- |
| `Id_Member`        | int(11) NOT NULL,                                    |
| `NIM`              | int(11) NOT NULL,                                    |
| `FullName`         | varchar(50) NOT NULL,                                |
| `DateOfBirth`      | date NOT NULL,                                       |
| `Gender`           | enum('Male','Female') NOT NULL,                      |
| `Email`            | varchar(100) NOT NULL,                               |
| `PhoneNumber`      | int(12) NOT NULL,                                    |
| `Address`          | varchar(255) NOT NULL,                               |
| `JoinDate`         | date NOT NULL,                                       |
| `MembershipStatus` | enum('Active','Inactive') NOT NULL DEFAULT 'Active', |
| `YearOfStudy`      | int(12) NOT NULL,                                    |
| `StudyProgram`     | varchar(255) NOT NULL                                |
|                    |                                                      |



| TBL_TRANSACTION  |                                                 |
| ---------------- | ----------------------------------------------- |
| `Id_Transaction` | int(11) NOT NULL,                               |
| `Id_Member`      | int(11) NOT NULL,                               |
| `Id_Book`        | int(11) NOT NULL,                               |
| `BorrowDate`     | date NOT NULL,                                  |
| `DueDate`        | date NOT NULL,                                  |
| `ReturnDate`     | date NOT NULL,                                  |
| `Status`         | enum('Borrowed','Returned','Overdue') NOT NULL, |
| `Id_User`        | int(11) NOT NULL                                |



| TBL_USER   |                                 |
| ---------- | ------------------------------- |
| `Id_User`  | int(11) NOT NULL,               |
| `Username` | varchar(50) NOT NULL,           |
| `Password` | varchar(255) NOT NULL,          |
| `FullName` | varchar(50) NOT NULL,           |
| `Photo`    | varchar(255) NOT NULL,          |
| `Level`    | enum('Admin','Member') NOT NULL |

