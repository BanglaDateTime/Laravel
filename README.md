# BanglaDateTime

**BanglaDateTime** is a Laravel package that allows you to easily format and convert DateTime to the Bangla calendar and Bangla number formats. It supports both current time and custom dates, as well as timezones.

## Features

- Convert DateTime to Bangla format.
- Convert to the Bangla calendar (Bengali Era).
- Supports custom dates and timezones.
- Easy to use with a fluent API.
- Helper functions for easy access to common operations.

## Installation

You can install the package via [Composer](https://getcomposer.org/):

```bash
composer require bangladatetime/laravel
```

## Laravel Integration

To integrate **BanglaDateTime** with Laravel, follow these steps:

1. **Publish the Configuration File:**

   Run the following command to publish the package configuration file:

   ```bash
   php artisan vendor:publish --provider="BanglaDateTime\Laravel\BanglaDateTimeServiceProvider"
   ```

   This will create a configuration file at `config/bangladatetime.php`.

2. **Configuration:**

   Edit the `config/bangladatetime.php` file to set your desired date formats and timezone.

3. **Usage:**

   The package integrates with Laravel's `Carbon` class, allowing you to use custom methods to format dates in Bangla format and Bangla calendar directly.

### Using with Eloquent Models

If you have a model with a `datetime` cast, you can easily format the datetime attributes using the BanglaDateTime methods. For example:

```php
use App\Models\User;

// Retrieve a user and format the created_at attribute in Bangla format
$user = User::find(1);
echo $user->created_at->toBanglaFormat('l jS F Y h:i:s');

// Format the created_at attribute in Bangla calendar format
echo $user->created_at->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Created at with Bangla format: বৃহস্পতিবার ১২ই সেপ্টেম্বর ২০২৪ ০৩:৩৭:০৩
Created at converted to Bangla: বৃহস্পতিবার ২৮শে ভাদ্র ১৪৩১ ০৩:৩৭:০৩
```

### Basic Example

```php
use Illuminate\Support\Carbon;

// Get current date and time in Bangla format
echo Carbon::now()->toBanglaFormat('l jS F Y h:i:s');

// Get current date and time in Bangla calendar format
echo Carbon::now()->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Current time with Bangla format: বৃহস্পতিবার ১২ই সেপ্টেম্বর ২০২৪ ০৩:৩৭:০৩
Current time converted to Bangla: বৃহস্পতিবার ২৮শে ভাদ্র ১৪৩১ ০৩:৩৭:০৩
```

### Setting a Custom Date

```php
use Illuminate\Support\Carbon;

// Set a custom date ('2023-04-13') in Bangla format
echo Carbon::create('2023-04-13')->toBanglaFormat('l jS F Y h:i:s');

// Set a custom date ('2023-04-13') in Bangla calendar format
echo Carbon::create('2023-04-13')->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Set Time with Bangla format: বৃহস্পতিবার ১৩ই এপ্রিল ২০২৩ ১২:০০:০০
Set Time & converted to Bangla: বৃহস্পতিবার ৩০শে চৈত্র ১৪২৯ ১২:০০:০০
```

### Working with Timezones

```php
use Illuminate\Support\Carbon;

// Set current time with a specific timezone ('Asia/Dhaka') in Bangla format
echo Carbon::now('Asia/Dhaka')->toBanglaFormat('l jS F Y h:i:s');

// Set current time with a specific timezone ('Asia/Dhaka') in Bangla calendar format
echo Carbon::now('Asia/Dhaka')->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Set Time & Time Zone with Bangla format: বৃহস্পতিবার ১২ই সেপ্টেম্বর ২০২৪ ০৯:৩৭:০৩
Set Time & Time Zone & converted to Bangla: বৃহস্পতিবার ২৮শে ভাদ্র ১৪৩১ ০৯:৩৭:০৩
```

### Custom Format and Timezone

You can specify a custom format and timezone when calling `toBanglaFormat` and `toBangla` methods:

```php
use Illuminate\Support\Carbon;

// Get current date and time in Bangla format with a custom format and timezone
echo Carbon::now()->toBanglaFormat('d/m/Y H:i:s', 'Asia/Dhaka');

// Get current date and time in Bangla calendar format with a custom format and timezone
echo Carbon::now()->toBangla('d/m/Y H:i:s', 'Asia/Dhaka');
```

**Output:**
```
Custom Time with Bangla format: ১২/০৯/২০২৪ ১৫:৩৭:০৩
Custom Time & converted to Bangla: ২৮/ভাদ্র/১৪৩১ ১৫:৩৭:০৩
```

## API

### `BanglaDateTime::create($time = 'now', $timezone = 'UTC')`

Creates a new `BanglaDateTime` instance.

- **`$time`**: The date and time to use (optional, defaults to `'now'`).
- **`$timezone`**: The timezone to use (optional, defaults to `'UTC'`).

### `format($format)`

Formats the date and time using a specified format, with the output in the Bangla locale.

- **`$format`**: The format string (same as PHP's `DateTime::format`).

### `toBangla($format)`

Converts and formats the date and time into the Bangla calendar and Bangla numbers.

- **`$format`**: The format string (same as PHP's `DateTime::format`).

## Helper Functions

**BanglaDateTime** provides the following global helper functions for easy access:

- **`bangla_date_time($time = 'now', $timezone = 'UTC')`**: Creates a new `BanglaDateTime` instance.

    ```php
    $date = bangla_date_time('2023-04-13', 'Asia/Dhaka');
    ```

- **`format_bangla_date($format, $time = 'now', $timezone = 'UTC')`**: Formats a date/time in Bangla format.

    ```php
    echo format_bangla_date('l jS F Y h:i:s');
    ```

- **`convert_to_bangla_calendar($format, $time = 'now', $timezone = 'UTC')`**: Converts a date/time to Bangla calendar format.

    ```php
    echo convert_to_bangla_calendar('l jS F Y h:i:s');
    ```

## Contributing

Feel free to contribute by submitting a pull request or opening an issue. Your contributions are highly appreciated!

## License

This library is open-sourced software licensed under the [MIT license](LICENSE).