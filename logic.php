<?php
    # Default number of words for when the user does not provide one
    $default_length = 4;

    # A (Hamilton inspired) array of 20 words to use in generating passwords
    $words = ["Alexander", "Hamilton", "ten", "dollar", "founding", "father", "Burr", "Eliza", "Angelica", "Lafayette", "rebellion", "scrappy", "hungry", "shot", "Washington", "Jefferson", "flag", "secretary", "united", "Miranda"];

    # For when first loading the site, generate a random password of the default length of words
    $password = generate_password($default_length, $words);

    foreach($_GET as $key => $value)
    {
        # Server validation if value is empty
        if(trim($value == ''))
        {
            $errorClass = 'has-warning';
            $errorMessage = '<span class="help-block">You did not specify number of words. Showing a default 4 word long password.</span>';

            # Generate a password with default length
            $password = generate_password($default_length, $words);

            # Add number if user asked for one
            add_number($password);

            # Add symbol if user asked for one
            add_symbol($password);

            return;
	    }

        # Server validation if value has anything other than only numbers or is not within the accepted 0-9 range (-x fails ctype_digit validation)
        elseif(!ctype_digit($value) || $value > 9)
        {
            $errorClass = 'has-error';
            $errorMessage = '<span class="help-block">You may only enter one digit (0-9); no letters or symbols. Showing a default 4 word long password.</span>';

            #Generate a password with default length
            $password = generate_password($default_length, $words);

            # Add number if user asked for one
            add_number($password);

            # Add symbol if user asked for one
            add_symbol($password);

            return;
	    }

        # Case when user did enter a numeric value within accepted range of 0-9
        else
        {
            $errorClass = 'has-success';
            $errorMessage = '<span class="help-block">Great job there my friend! Enjoy your super awesome password.</span>';

            #Generate a password with the word length provided by the user
            $password = generate_password($value, $words);

            # Add number if user asked for one
            add_number($password);

            # Add symbol if user asked for one
            add_symbol($password);

            return;
        }
    }

    # Generates a password using as inputs the desired number of words and the array of possible words to pick from
    function generate_password($num_of_words, $words)
    {
        # Initiate empty password
        $pwd = '';
        for($i = 0; $i < $num_of_words; $i++)
        {
            # Find random word from words array and concatenate to password
            $pwd .= $words[array_rand($words)];
            # Add dashes between words
            $pwd .= "-";
        }
        # Remove last dash
        return rtrim($pwd, "-");
    }

    # Adds a number to the end of the password, if user selected Add Number checkbox
    function add_number(&$password)
    {
        $number_add = (isset($_GET['add_number']) ? $_GET['add_number'] : null);
        if($number_add == "on")
        {
            $password .= rand(0,9);
        }
    }

    # Adds a @ symbol to the end of the password, if user selected Add Symbol checkbox
    function add_symbol(&$password)
    {
        $symbol_add = (isset($_GET['add_symbol']) ? $_GET['add_symbol'] : null);
        if($symbol_add == "on")
        {
            $password .= '@';
        }
    }

?>
