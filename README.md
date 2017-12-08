# FSBrowser
HTML Filesystem Browser w/ Login System

## Default Login
```
Username: Admin
Password: FSBrowserAdmin
```
## Creating a new account

1. Create a <username>.acc file in the accounts folder.
2. Store the account password in sha256 in the <username>.acc file
3. Create a <username>.home file in the accounts folder.
4. Store the home / minimum path in the <username>.home file.
  
### Example
```
Username: example
Password: example
```
```
example.acc
50d858e0985ecc7f60418aaf0cc5ab587f42c2570a884095a9e8ccacd0f6545c

example.home
C:/
```

