<?php
    # Default number of words for when the user does not provide one
    $default_length = 4;
    # A (small) array of words to use in generating passwords
    $words = ["hello", "hi", "Chris", "Sophia", "Joey", "Ana", "tennis", "nba", "php", "ruby"];

    # For when first loading the site, generate a random password of the default length of words
    $password_with_dashes = generate_password($default_length, $words);

    foreach($_GET as $key => $value)
    {
        # Server validation if value is empty
        if(trim($value == ''))
        {
            $errorClass = 'has-warning';
            $errorMessage = '<span class="help-block">You did not specify number of words. Showing a default 4 word long password.</span>';

            #Generate a password with default length
            $password_with_dashes = generate_password($default_length, $words);

            return;
	    }

        # Server validation if value has anything other than only numbers or is not within the accepted 0-9 range
        elseif(!ctype_digit($value) || $value > 9)
        {
            $errorClass = 'has-error';
            $errorMessage = '<span class="help-block">You may only enter one digit (0-9); no letters or symbols. Showing a default 4 word long password.</span>';

            #Generate a password with default length
            $password_with_dashes = generate_password($default_length, $words);

            return;
	    }

        # Case when user did enter a numeric value within accepted range of 0-9
        else
        {
            $errorClass = 'has-success';
            $errorMessage = '<span class="help-block">Great job there my friend! Enjoy your super awesome password.</span>';

            #Generate a password with the word length provided by the user
            $password_with_dashes = generate_password($value, $words);

            return;
        }
    }

    # Generates a password using as inputs the desired number of words and the array of possible words to pick from
    function generate_password(int $num_of_words, $words)
    {
        # Initiate empty password
        $password = '';
        for($i = 0; $i < $num_of_words; $i++)
        {
            # Find random word from words array and concatenate to password
            $password .= $words[array_rand($words)];
            # Add dashes between words
            $password .= "-";
        }
        # Remove last dash
        return rtrim($password, "-");
    }

    # Need to work on this
    # function add_number();
    # function add_symbol();
