# HybridAuth 2.3.0-dev ( Exactle Fork)

HybridAuth enables developers to easily build social applications and tools 
to engage websites visitors and customers on a social level by implementing 
social sign-in, social sharing, users profiles, friends list, activities 
stream, status updates and more. 

The main goal of HybridAuth is to act as an abstract API between your application
and various social apis and identities providers such as Facebook, Twitter, 
MySpace and Google.

## Repository

# Exactle Specific Changes
(Mostly in following commit : https://github.com/waseemahmad/hybridauth/commit/0a77a6f8cb660d657ec0ca47978d773ba112d5bf )

- **Adds** a Persistence interface to Hybrideauth
- **Provides** an implementation for ElasticSearch based Persistence
- **Provides** an implementation for RDS(MySQL) based persistence implementation

# Exactle Persistence Interface 
( https://github.com/waseemahmad/hybridauth/blob/master/hybridauth/Hybrid/PersistenceInterface.php)

- **Interface** to write User Contacts, profile and activity information to a persistent store.

# Elastic Search based Persistence
(https://github.com/waseemahmad/hybridauth/blob/master/hybridauth/Hybrid/ESPersistence.php)

- **Implements** the persistence interface for Elastic Search using a sniffing connection pool.

# MySQL Based Persistence
(https://github.com/waseemahmad/hybridauth/blob/master/hybridauth/Hybrid/MySQLPersistence.php)

- **Implements** the persistence interface for MySQL based persistent store.



# HybridAuth repository is made up of several projects:

- **HybridAuth Core library** includes OpenID, Facebook, Twitter, LinkedIn, Google, Yahoo, Windows Live, Foursquare and AOL.
- **The additional providers project** contains many others services
  which you may want to use,
- **Examples and demos** contains five examples for you to test, 


## Getting Started

We highly recommend that you download and use the latest release from HybridAuth website
at [http://hybridauth.sourceforge.net/download.html](http://hybridauth.sourceforge.net/download.html) 

You can find  complete documentation for HybridAuth
at [http://hybridauth.sourceforge.net](http://hybridauth.sourceforge.net)
