<?php
// use Dotenv\Dotenv;
class AppConfig
{
    private static $instance = null;
    public string $DB_NAME;
    public string $DB_HOST;
    public string $DB_USERNAME;
    public string $DB_PASSWORD;
    public bool $APP_DEBUG = false;

    //This Restricts To Create More Than One Object Of This Class
    //We are following singleton pattern that is only one object can be created using factory methods(since it is private constructor)
    private function __construct()
    {
    }

    //getInstance is a factory method 
    //this returns self i.e current class object
    public static function getInstance(string $rootpath = './'): self
    {
        //for static methods u cannot use "this" in php
        //so we are using self to call the static methods in php
        //self refers to current class object
        if (self::$instance === null) {
            self::$instance = new self();
        }
        self::reloadEnv($rootpath);
        return self::$instance;
    }

    private static function reloadEnv(string $rootpath): void
    {
        try {
            //Dotenv--->package
            //\Dotenv --> is a class inside the Dotenv package
            //and it has a static method createUnsafeImmutable 
            $dotEnv = Dotenv\Dotenv::createUnsafeImmutable($rootpath);
            $dotEnv->load();

            $dotEnv->required(['APP_DEBUG']);
            self::$instance->APP_DEBUG = getenv("APP_DEBUG") !== "false";

            $dotEnv->required(['DB_NAME', 'DB_USERNAME', 'DB_PASSWORD', 'DB_HOST', 'APP_DEBUG']);
            self::$instance->DB_NAME = getenv("DB_NAME");
            self::$instance->DB_HOST = getenv("DB_HOST");
            self::$instance->DB_USERNAME = getenv("DB_USERNAME");
            self::$instance->DB_PASSWORD = getenv("DB_PASSWORD");
        } catch (Exception $e) {
            die(self::$instance->APP_DEBUG ? $e->getMessage() : "unable to find config");
        }
    }
}

/**
 * App_Debug is basically used to toggle between production and development mode
 * In Development u need to see the potential errors 
 * In production environments, revealing detailed error messages can expose sensitive information about your application's structure and code, potentially aiding attackers.
 * If true, displays the full error message for debugging purposes.
 * If false, presents a generic "unable to find config" message to avoid exposing sensitive information.
 * 
 * The createUnsafeImmutable method is used because it ensures that the loaded environment variables cannot be modified after they are loaded. This helps to prevent accidental or malicious changes to sensitive information.
 */
