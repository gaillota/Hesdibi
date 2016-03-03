# Hesdibi
#### File storage platform, also known as DMS (Document Management System)
##### It helps you stay organized with all of your digitized paper-based documents on a daily basis.

## Features
The core feature of Hesdibi is to host and organize your paperless documents. You can :
* Host files (PDF and Images for now)
* Organize your files into folders
* Send files by e-mail
* Generate sharing links to let other people access the file(s) you choose
* Create viewer user accounts and share them files

## Technologies
* Symfony 2
* Composer
* Mailgun

## Requirements
* [Mailgun](https://www.mailgun.com/) API key for e-mails.

## Installation
1. Clone repository to your server
  * `git clone https://github.com/gaillota/Hesdibi.git`
2. Install dependencies
  * `php composer install`
3. Edit the `app/config/parameters.yml` file
4. Create the database
  * `php app/console doctrine:database:create`
5. Create the database schema
  * `php app/console doctrine:schema:update --force`
6. Create the first user (use the `super-admin` flag to make him so)
  * `php app/console fos:user:create $USERNAME $YOUR@EMAIL $PASSWORD --super-admin`

## Usage
### Login
In order to use Hesdibi, you __must__ have an account.

![Login page](https://cloud.githubusercontent.com/assets/6444106/13490707/4f4e16d2-e12e-11e5-9e9a-3fe472c395ff.PNG)

Every page is hidden behind the Symfony firewall, except for the login page.

### Manage files
Once you have logged in, you can access your files.

![Logged in](https://cloud.githubusercontent.com/assets/6444106/13490759/90313972-e12e-11e5-9ee8-9c98b8b0acc0.PNG)

You can now upload your files or create folder to organize your Hesdibi

![New](https://cloud.githubusercontent.com/assets/6444106/13490804/d51e390e-e12e-11e5-9317-c74818ae2dea.PNG)

#### Folder options
![Folder options](https://cloud.githubusercontent.com/assets/6444106/13491199/61294b12-e131-11e5-8c12-72658934fe49.PNG)

#### Files options
![File options](https://cloud.githubusercontent.com/assets/6444106/13491197/5ee99456-e131-11e5-91e0-3d3a31ff9fa5.PNG)

### Other features

#### Send file via e-mail
You can send files by e-mail (once at a time)

![email](https://cloud.githubusercontent.com/assets/6444106/13491528/18d3fafe-e133-11e5-93d9-4c44cf28a958.PNG)

#### Share file with other users
You can create viewer accounts and share them file.
![users](https://cloud.githubusercontent.com/assets/6444106/13491316/153b2792-e132-11e5-89d8-1ba0509b8bc3.PNG)

You just need to specify their e-mail address and a username.
![adduserform](https://cloud.githubusercontent.com/assets/6444106/13491335/2e1f035a-e132-11e5-9c62-a047d992e6b9.PNG)

They will then receive a confirmation e-mail with a __random generated password__ and the link to log in to Hesdibi.

#### Generate share link
You can also generate sharing links and send them to the people you want to have access to the files you choose.

![sharinglinks](https://cloud.githubusercontent.com/assets/6444106/13491306/0b77f514-e132-11e5-8809-106b7eee5fb7.PNG)

#### Account management
You can also manage your account :
* Change your username
* Change your e-mail
* Change your password

![account](https://cloud.githubusercontent.com/assets/6444106/13491342/3669e7f0-e132-11e5-8953-559044b7338d.PNG)

A Symfony project created on June 26, 2015, 8:25 pm.


![adduser](https://cloud.githubusercontent.com/assets/6444106/13491328/22a00a74-e132-11e5-905f-eed42a77b2d3.PNG)

TODO List
-----
- [x] Remove table header on sharedLinks and expend table on all width (12)
- [x] Add returning arrow on users list and folders list
- [ ] Display folder tree somehow in the folders list page
- [x] Check file size (in addition to mime-type) in js after selecting one in the modal
- [x] Display parents' folder on the folder moving page (for folders with same name)
- [x] Add returning arrow on folder moving page
- [x] Change button color on folder renaming modal
- [x] Add js confirm on folder delete page
- [x] Add folder options next to h2
- [x] Add returning arrow on email sending page
- [x] Add returning arrow on share-with page
- [x] Display error on share-with page when no simple users
- [x] Display folder tree on moving file page
- [x] Go back button on share link removing
- [x] Add fontawesome icon on alerts
- [x] Take care of the mobile interface
  1. Display search key when there's one
  2. "Results for xxx"
- [x] Check breadcrumb on all pages
  1. Folder deletion
  2. Share Link deletion
- [x] Resolve email / username login error (works on prod somehow)
- [x] //Change js preview of PDF
- [x] Use macro for dropdowns
- [x] Remove children folder when moving one
- [x] Add folder on share links page
- [x] Add redirectCorrectly method in FolderController
- [ ] Add phone book
- [ ] Create a search page (optional)
- [x] Check regular user page
- [x] Check fontawesome icons on all pages

- [ ] Build RESTful API:
  - Files API
  - [X] Retrieve files from a folder
  - [X] Download file
  - [X] Get file informations
  - [X] Get file data
  - [X] Send file via email
  - [X] Generate share link
  - [ ] Change file location
  - [ ] Rename file
  - [ ] Delete file
  - [ ] Upload file (leeeeel)
  - Folder API
  - [X] Get folder information
  - [ ] Change folder location
  - [ ] Rename folder
  - [ ] Delete folder
  - Users API
  - [X] Get user informations
  - [ ] ~~Change user password~~
  - [ ] Change username/email
  - [X] Create user
  - Share Link API
  - [X] Get shared links
