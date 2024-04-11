<?php

/**
 *som ser till att namnet på en person alltid skrivs ut med stor bokstav först och sedan små bokstäver,
 *
 * @param string $namn
 * @return string 
 */
function formatera_namn(string $namn): string
{
    
    return ucwords(strtolower($namn));
}