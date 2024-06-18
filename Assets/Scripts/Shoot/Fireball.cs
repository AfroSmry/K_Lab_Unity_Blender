using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Fireball : MonoBehaviour
{
    public float speed = 10.0f;
    public int damage = 1;
    private void Start()
    {
        
    }
    // Update is called once per frame
    void Update()
    {
        transform.Translate(0, 0, speed * Time.deltaTime);
    }
    void OnTriggerEnter(Collider other)
    {
        PlayerCharter player = GetComponent<PlayerCharter>();
        if (player != null)
        {
            Debug.Log("Player hit");
        }
        Destroy(this.gameObject);
    }
}
