# My PHP Project

This is a PHP project that includes dynamic page loading and alert functionalities.

## Description

This project dynamically includes different PHP pages based on the value of the `$ELEMENT` variable. It also includes JavaScript functions to show success and error alerts using the SweetAlert2 library.

## Prerequisites

- PHP 7.0 or higher
- Web server (e.g., Apache, Nginx)
- MySQL
- SweetAlert2 library

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/your-repo-name.git
    ```
2. Navigate to the project directory:
    ```bash
    cd your-repo-name
    ```
3. Ensure your web server is configured to serve the project directory.

## Usage

1. Set the `$ELEMENT` variable to one of the following values: `dashboard`, `entree`, `produit`, `achat`.
2. Access the project through your web server.
3. The corresponding page will be included dynamically.
4. Use the JavaScript functions `showSuccessAlert(message)` and `showErrorAlert(message)` to display alerts.
