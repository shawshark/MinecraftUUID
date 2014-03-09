## MinecraftUUID


Super small website for getting Minecraft username UUID's


Example to use this:

### Java
```java
public static String getUUID(String player) {
		String uuid = null;
		try {
			// Get the UUID from SwordPVP
			URL url = new URL("https://uuid.swordpvp.com/uuid/" + player);
			URLConnection uc = url.openConnection();
			uc.setUseCaches(false);
			uc.setDefaultUseCaches(false);
			uc.addRequestProperty("User-Agent", "Mozilla/5.0");
			uc.addRequestProperty("Cache-Control", "no-cache, no-store, must-revalidate");
			uc.addRequestProperty("Pragma", "no-cache");

			// Parse it
			String json = new Scanner(uc.getInputStream(), "UTF-8").useDelimiter("\\A").next();
			JSONParser parser = new JSONParser();
			Object obj = parser.parse(json);
			uuid = (String) ((JSONObject) ((JSONArray) ((JSONObject) obj).get("profiles")).get(0)).get("id");
		} catch (Exception ex) {
			ex.printStackTrace();
		}
		return uuid;
	}
```

### PHP
```php
function getUUID($username)
{
    $ch = curl_init();
    $curlConfig = array(
        CURLOPT_URL => "https://uuid.swordpvp.com/uuid/" . $username,
        CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($ch, $curlConfig);
    $json = curl_exec($ch);
    curl_close($ch);
    $jsonFinal = json_decode($json, true);
    return $jsonFinal['profiles'][0]['id'];
}
```



