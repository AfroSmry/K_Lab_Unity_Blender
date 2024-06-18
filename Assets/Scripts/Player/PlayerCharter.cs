using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerCharter : MonoBehaviour
{
    public int _health;
    // Start is called before the first frame update
    void Start()
    {
        _health= 5;
    }
    private void Update()
    {
        
    }
    public void Hurt(int damage)
    {
        _health -= damage; 
        Debug.Log("Health: " + _health);
    }
}
