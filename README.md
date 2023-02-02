# Virus Total

## Connect to VirusTotal via PHP, scan files and view the result

This class uses VirusTotal's public API v3 and provides two methods **fileScan** and **fileReport** to scan a file and retrieve its report respectively. The class requires an API key to be passed to its constructor, which will be used to make requests to the VirusTotal API.

The **fileScan** method takes a file path as its argument and returns the response from VirusTotal in an array format after decoding the JSON response.

The **fileReport** method takes a file hash as its argument and returns the report of the file from VirusTotal in an array format after decoding the JSON response.

The **sendRequest** method is a protected method used to send the HTTP request to VirusTotal using the cURL library. It takes the URL, headers, and post data as its arguments and returns the response from VirusTotal as a string.
