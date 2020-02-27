<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About 

This bank service api was bootstrapped using latest version of laravel

it contains basic functionalities of a conventional banking system which includes but not limited to

- Creating bank account 

- depositing funds into your bank account

- withdrawing funds from your account

- viewing transactions by account number

## Project set up
```
  git clone https://github.com/obie3/fixaslab.git
  cd fixaslab
  composer install
  cp .env.example .env
  php artisan key:generate
```

Create a database and update the `.env` file with your database credentials.
Next, migrate your database using the following command.
```
  php artisan migrate:refresh --seed
```
Start the local server:
```
  php artisan serve
```

All routing are carried out on the `/routes/api.php` file

## Endpoints

#### Create Account
`https://baseurl/api/account/create`

```bash
  Seeded Account types re : ['Savings', 'Current', 'Family']
```

```bash
  Users have also been seeded using faker to generate their details valid userId is between 1 and 15
```

Params

| Key                                | Value         | 
| -----------------------------------|:-------------:|
| account_type_id                    | saving        |
| account_balance                    | 1000000       |
| user_id                            | 1

Response:

```bash
   
    "success": "Account created successfully",
    "data": {
        "account_number": "2707005016543280",
        "account_type_id": 1,
        "account_balance": 45000,
        "customer_profile_id": 4,
        "updated_at": "2020-02-27 07:40:00",
        "created_at": "2020-02-27 07:40:00",
        "id": 14
    }
    
```

```bash 
    {
    "error": "Missing field found",
    "message": "The user id field is required."
}
    
```

#### View All Customers
`https://baseurl/api/customers/all`

Response:

```bash
  {
    "success": "Records returned",
    "data": [
        {
            "id": 1,
            "name": "Gabrielle Zulauf",
            "phone_number": "+6491334507012",
            "address": "3271 Ollie Ridges Suite 739\nWest Santos, MD 10663",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 2,
            "name": "Eunice Rice",
            "phone_number": "+6464553437538",
            "address": "445 Ernser Track Suite 223\nWest Loraineport, NE 37514-2299",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 3,
            "name": "Alexa Predovic",
            "phone_number": "+6147974852967",
            "address": "9369 Jesse Bypass Apt. 952\nTryciatown, MD 19216-1165",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": [
                {
                    "id": 1,
                    "account_number": "375773231238",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 00:56:04",
                    "updated_at": "2020-02-27 00:56:04",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 2,
                    "account_number": "472555866146",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 00:56:15",
                    "updated_at": "2020-02-27 00:56:15",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 3,
                    "account_number": "712624706750",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 00:58:25",
                    "updated_at": "2020-02-27 00:58:25",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 4,
                    "account_number": "05802679015496",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:00:11",
                    "updated_at": "2020-02-27 01:00:11",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 5,
                    "account_number": "6526527594",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:00:56",
                    "updated_at": "2020-02-27 01:00:56",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 6,
                    "account_number": "352927549",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:01:53",
                    "updated_at": "2020-02-27 01:01:53",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 7,
                    "account_number": "0415066",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:05:50",
                    "updated_at": "2020-02-27 01:05:50",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 8,
                    "account_number": "25797575",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:06:11",
                    "updated_at": "2020-02-27 01:06:11",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 9,
                    "account_number": "0111514041298",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:06:25",
                    "updated_at": "2020-02-27 01:06:25",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 10,
                    "account_number": "93396209275",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:07:27",
                    "updated_at": "2020-02-27 01:07:27",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                },
                {
                    "id": 11,
                    "account_number": "67783380869875",
                    "account_type_id": 2,
                    "account_balance": 45000,
                    "customer_profile_id": 3,
                    "created_at": "2020-02-27 01:07:57",
                    "updated_at": "2020-02-27 01:07:57",
                    "account_type": {
                        "id": 2,
                        "title": "Current",
                        "minimum_balance": 5000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                }
            ]
        },
        {
            "id": 4,
            "name": "Ruthie Bartell I",
            "phone_number": "+3796976190574",
            "address": "3772 Lorenzo Parkway\nWest Hildaville, KS 82545",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": [
                {
                    "id": 14,
                    "account_number": "2707005016543280",
                    "account_type_id": 1,
                    "account_balance": 1105000,
                    "customer_profile_id": 4,
                    "created_at": "2020-02-27 07:40:00",
                    "updated_at": "2020-02-27 12:44:46",
                    "account_type": {
                        "id": 1,
                        "title": "Savings",
                        "minimum_balance": 1000,
                        "created_at": "2020-02-26 23:33:32",
                        "updated_at": "2020-02-26 23:33:32"
                    }
                }
            ]
        },
        {
            "id": 5,
            "name": "Helmer Daniel",
            "phone_number": "+9642828726044",
            "address": "3947 Hane Walk Suite 457\nLake Alex, OH 48749",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 6,
            "name": "Mr. Tobin Wilkinson",
            "phone_number": "+8209687322466",
            "address": "35469 Anahi Place Apt. 650\nRitchiestad, IN 69615-2413",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 7,
            "name": "Prof. Madelyn Hermiston",
            "phone_number": "+9549410135425",
            "address": "841 Stroman Pines\nBoyerside, MA 10559-8703",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 8,
            "name": "Mack Renner",
            "phone_number": "+1990125259341",
            "address": "71513 Hane Meadows Apt. 946\nSkylarshire, ND 71693-1965",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 9,
            "name": "Mrs. Carlotta Carter V",
            "phone_number": "+8249104744567",
            "address": "56765 Deckow Plains Apt. 229\nNorth Hester, NV 52355-0994",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 10,
            "name": "Myrtis Kilback PhD",
            "phone_number": "+7410844352935",
            "address": "45054 Batz Squares\nRyanfort, KY 28664",
            "gender": "male",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 11,
            "name": "Eda Wiegand",
            "phone_number": "+1003058887000",
            "address": "436 Ila Manor\nNorth Lelaland, VA 24199",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 12,
            "name": "Dr. Michelle Spencer Sr.",
            "phone_number": "+8456347313397",
            "address": "15640 Barrows Court Suite 180\nKertzmannport, TX 87200",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 13,
            "name": "Erica Lindgren",
            "phone_number": "+4778256490947",
            "address": "423 Ivy Mountain\nWest Mayra, MA 31499-5427",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 14,
            "name": "Susie Moore",
            "phone_number": "+7245262721001",
            "address": "62953 Jeanette Shore Apt. 876\nHamillport, SC 85077-1937",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        },
        {
            "id": 15,
            "name": "Melyssa Rosenbaum",
            "phone_number": "+7026236283815",
            "address": "36523 Lindsay Port\nWest Gonzaloborough, GA 21218",
            "gender": "female",
            "created_at": "2020-02-26 23:33:32",
            "updated_at": "2020-02-26 23:33:32",
            "account_detail": []
        }
    ]
}
```
