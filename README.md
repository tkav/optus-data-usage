# optus-data-usage
Export Optus Data Usage

Based on https://github.com/stevenocchipinti/optus-mobile-usage.

<b>Not working</b> - Cannot find `SUBSCRIPTION_ID` variable to get data usage.

## Usage

As per example.php:

<b>Include class file</b>
```php
include('optus.php');
```

## Login

<b>Enter your Optus Account credentials and Login to create a session</b>

```php
//Optus Account
$Username = 'USERNAME';
$Password = 'PASSWORD';

//Login and create session
$login = Optus::login($Username, $Password);
```

## Variables Required

The following environment variables are required, found by looking at
the AJAX requests once logged in to the Optus website

- `USERNAME`
- `PASSWORD`
- `CUSTOMER_ID`
- `ACCOUNT_ID`
- `SUBSCRIPTION_ID` *Can't find*


## Export Usage
<b>Export Data Usage</b>

```php
//Get Data Usage
$txt = Optus::getPage('test.txt', $CustomerID, $AccountID, $SubscriptionID);
```

<i>Ensure .txt file and session.txt is writable in the directory</i>
