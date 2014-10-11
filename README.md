Address
=======

PHP 5.4+ library to make working with Addresses safer, easier, and fun!

Installation
------------

The recommended way to install Address is through [Composer][2]:

```json
{
    "require": {
        "black/address": "@stable"
    }
}
```

__Protip:__ You should browse the [`black/address`][7] page to choose a stable version to use, avoid the `@stable` meta
constraint.

Usage
-----

Usage of this class is simple. A complete Postal address is based on a street (number and name), a postal code and a locality.
But we also need region, post office box number and country so a complete Postal address should use all this fields.

We have 3 value objects for a complete Postal Address.

#### Country

A country is composed by a code and a name. This code is an ISO 3166-1 alpha-2 code and the name is in english.

__Exemple__

```php
$country = new Address\Country("France", "FR");
echo $country->getName(); // return (string) France
```

It is possible to create a Country object with two static methods. 

```php
$country = Address\Country::buildFromISOCode("FR");
```

```php
$country = Address\Country::buildFromName("France");
```

__Available methods__

- `::buildFromISOCode($code)`
- `::buildFromName($name)`
- `->getName()`
- `->getCode()`
- `->getValue()`
- `->getValueAsArray()`
- `->isEqualTo($country)`

__Exception__

An `Address\InvalidCountryException()` will be thrown if code or name is not found in `Resources\countries.php`


#### Street

A street is composed by a number and a name.

__Exemple__

```php
$street = new Address\Street(1600, "Amphitheatre Pkwy");
$street->getValue(','); // return (string) 1600, Amphitheatre Pkwy
```
__Available methods__

- `->getNumber()`
- `->getName()`
- `->getValue($separator)`
- `->getValueAsArray()`
- `->isEqualTo($street)`

#### Postal

Postal is the main Value Object. He needs all the informations but an empty string is allowed.

```php
$street  = new Address\Street(1600, "Amphitheatre Pkwy");
$country = new Address\Country("United States", "US");

$postal = new Address\Postal(
    $street,
    94043,
    "Mountain View",
    "CA",
    23,
    $country
);
```

__Available methods__

- `->getStreet()`
- `->getStreetName()`
- `->getStreetNumber()`
- `->getPostalCode()`
- `->getLocality()`
- `->getRegion()`
- `->getPostOfficeBoxNumber()`
- `->getCountry()`
- `->getCountryCode()`
- `->getCountryName()`
- `->getValue()` Return an array


#### Formatter
Ok now, you have a complete Postal Address but somewhere in your brain, you say : 

`Oh fuck, sometimes I don't have any region or post office box and addresses are not writed in France or US with the same order and...`

Don't panic, there is a formatter for that!.


License
-------

Address is released under the MIT License. See the bundled LICENSE file for details.

Contributing
------------

See CONTRIBUTING file.

Credits
-------

This README is heavily inspired by [Geocoder][1] library by the great [@willdurand][2]. This guy needs your [PR][3] for the
sake of the REST in PHP.

Alexandre "pocky" Balmes [alexandre@lablackroom.com][4]. Send me [Flattrs][5] if you love my work, [buy me gift][6] or hire me!

[1]: https://github.com/geocoder-php/Geocoder
[2]: https://github.com/willdurand
[3]: http://williamdurand.fr/2014/07/02/resting-with-symfony-sos/
[4]: mailto:alexandre@lablackroom.com
[5]: https://flattr.com/profile/alexandre.balmes
[6]: http://www.amazon.fr/registry/wishlist/3OR3EENRA5TSK
[7]: https://packagist.org/packages/black/geo
