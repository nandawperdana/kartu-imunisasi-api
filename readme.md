kartu-imunisasi WEB-API using laravel

Instalation :
1. Set up environment (Apache,MySQL and php 5.*^,composer)
2. Create table 'imunisasi' on MySQL
3. On command line, go to project directory and type 'php artisan migrate' (Generate database structure)
4. Then type composer install

API URI LIST :

| URI                                                    | DESCRIPTION                            | METHOD        +--------------------------------------------------------+----------------------------------------+---------
  api/v1/attributes                                      | get all list of attributes             | GET
  api/v1/attributes                                      | create new attributes                  | POST
  api/v1/attributes/shows/{type}                         | get list attributes by type            | POST
  api/v1/attributes/{id}                                 | get attribute by id                    | GET
  api/v1/attributes/{id}                                 | update attribute by id                 | PUT
  api/v1/attributes/{id}                                 | delete attribute by id                 | POST
  api/v1/children                                        | get all list of children               | GET
  api/v1/children/{id}                                   | create new child                       | POST
  api/v1/children/{id}                                   | get child by id                        | POST
  api/v1/children/{id}                                   | update child by id                     | PUT
  api/v1/children/{id}                                   | delete child by id                     | POST
  api/v1/children/{id}/histories                         | get all histories by child_id          | GET
  api/v1/children/{id}/upload                            | upload child image                     | PUT
  api/v1/users                                           | get all list of users                  | GET
  api/v1/users/{id}                                      | get user by id                         | GET
  api/v1/users/{id}                                      | update user by id                      | PUT
  api/v1/users/{id}                                      | delete user by id                      | POST
  api/v1/users/{id}/children                             | get all histories by user_id           | GET
  api/v1/users/{id}/upload                               | upload user image                      | PUT
  api/v1/histories                                       | get all list of histories              | GET
  api/v1/histories                                       | create new histories                   | POST
  api/v1/histories/{id}                                  | get history by id                      | GET
  api/v1/histories/{id}                                  | update history by id                   | PUT
  api/v1/histories/{id}                                  | delete history by id                   | POST
  api/v1/authenticate                                    | login using email and password         | POST
  api/v1/signup                                          | sign up using email and password       | POST 
