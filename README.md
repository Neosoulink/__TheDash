<h1  align="center">__TheDash</h1>

## 📋 Contents

- [Contents](#-contents)
- [About](#-about)
- [How to install](#-how-to-install)
- [Devs section](#-devs-section)
  - [App structure](#-dpp-structure)
  - [Contributions guideline](#-compiling-assets)
    - [Branch naming conventions](#-branch-naming-conventions)
    - [Codes convention](#-codes-convention)
    - [To do](#-to-do)

## 🤔 About

__TheDash is an open-source application which gives you the possibility to organize and find your projects more easily in your local php server *(E.g: XAMP, Laragon, etc.)*
Otherwise it gives you some details about your php environment server.

| Screenshot 1 | Screenshot 2 |
|--------------|--------------|
|![Screenshot_2021-11-13_051523](assets/img/screenshots/2021-11-13_051754.png) | ![Screenshot_2021-11-13_051523](assets/img/screenshots/2021-11-13_051523.png) |

## 🏁 How to install

The installation will be done in a few steps and will only take you a few minutes

1. First you need to download the project. You can **Download the zip** or **Clone it** or even **Fork it** (which I recommend for those who want to make their contributions).

2. Place the application folder in the root of your local server (where localhost point) and rename the foldername to **'__TheDash'**

3. Finally, create or replace the `index.php` file with this content:
	```php
	<?php
	require("./__TheDash/index.php");
	```

	> (If you want to keep your old `index.php` file, I advise you to just rename it. The app ignores files in root).

Nice job 🎉
Now you can use the app by going to `http://localhost` in your browser.

## 💻 Devs section

### 📂 App structure

    .
    ├── assets
    ├── components
    ├── config
    ├── lib
    ├── views
    ├── .editorconfig
    ├── .env
    ├── .gitignore
    ├── App.php
    ├── index.php
    ├── LICENSE
    ├── phrwatcher.php
    └── README.md

### 🤝 Contributions guideline

For those who want to contribute, I recommend you to **Fork** the project and  tehn make your **pull-requests** 😀.

#### 🚧 Branch naming conventions

 **The main prefixes for branches in this project are:**
- **feature** (use this when you work on a new user story followed by the name of the feature)
- **issue** (use this when resolving an issue followed by the description or name of the issue you're currently working on)
- **hotfix** (this is the branch, for fixing minor issues that arise from the production code, use this followed by the name or description of the fix to be made)
- **develop** (this is the pre-release version branch that receives updates from below branch prefix)
- **master** (this is the main branch where all the stable and tested code reside before going to production, this prefix is not followed by any description or name)

#### 💻 Codes convention

All conventions that we'll use in our codes are in ``.editorconfig`` file. So you have to use an ``IDE`` like VScode to apply codes rules in this file.

#### 📋 To do

- [ ] Project thumbnail preview
- [ ] List languages used
- [ ] List recent projects opened


<br />

<h6>❤ Thank you for going through this little project. If you like the concept, you can leave ⭐ and share it ;)</h6>

<h6>_TheDash@2021 V0.0.1. By @Neosoulink</h6>
