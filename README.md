## About:
This project builds a basic User API.
**PSR1/PSR2** Coding Style was used.

## Instructions:

#### 1) Run Composer:
Go to the project directory and run:
```bash
composer install
```


#### 2) Build docker:
```bash
docker-compose up -d
```

#### 3) Use the api:
Go to [http://localhost:8081/src/user.php?uid=2](http://localhost:8081/src/user.php) to start using the api!.

To get a taste of other supported methods, import provided [Postman](https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop/related?utm_source=chrome-ntp-icon)
 collection (*postman-collection-user-rest-api.json*)
#### 4) Run tests:
Use phpunit.xml to run tests

## Future Improvements:
- Better Error Handling
- Prevent SQL injection and check security overall
- Better Test Coverage
