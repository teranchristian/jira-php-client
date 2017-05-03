# jira-php-client
WORK IN PROGRESS

**important-note:** 
This client uses the latest version of the Jira Api. (in the future, I will locked this to use Jira Api V2)

# Requirements

- PHP >= 5.4.9

# Installation

1. Download and Install PHP Composer.

   ``` sh
   curl -sS https://getcomposer.org/installer | php
   ```

2. Then run Composer's install or update commands to complete installation. 

   ```sh
   php composer.phar install
   
# Configuration
Create a config file under /config/config.ini

[Jira]
host = '<YOUR-JIRA-HOST>'
user = '<JIRA-USERNAME>'
password = '<JIRA-PASSWORD>'

# Usage

## Table of Contents

### Issue
- [Get All]
- [Get Issue]
- [New Issue]

### User
- [Get All]
- [Get User]


# NOTE
I have included a small CLI, still a lot of work to do
